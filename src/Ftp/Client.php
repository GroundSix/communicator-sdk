<?php

namespace GroundSix\Communicator\Ftp;

use const FTP_TIMEOUT_SEC;

class Client
{
    const HOST = 'data.communicatorcorp.com';
    /** @var resource */
    private $stream;
    private $options = [
        'host' => self::HOST,
        'port' => 21,
        'timeout' => 90,
        'ssl' => true,
        'username' => 'anonymous',
        'password' => 'guest',
        'passive' => true,
    ];

    /**
     * FtpClient constructor.
     *
     * @param array $options Array containing connection options.
     *                       $params = [
     *                       'host'         => (string) FTP host. Default: data.communicatorcorp.com
     *                       'username'     => (string) FTP username. Default: anonymous.
     *                       'password'     => (string) FTP password. Default: guest.
     *                       'port'         => (int) FTP port. Default: 21.
     *                       'timeout'      => (int) Timeout for all network activity. Default: 90.
     *                       'ssl'          => (bool) Should the connection be made over ssl. Default: true.
     *                       'passive'      => (bool) Should the connection use passive mode. Default: true.
     *                       ]
     *
     * @throws NetworkException if a FTP connection cannot be made
     * @throws NetworkException if the login attempt fails
     * @throws FTPError if passive mode cannot be set
     */
    public function __construct(array $options = [])
    {
        $this->options = array_merge($this->options, $options);

        $this->connect();
    }

    public function __destruct()
    {
        $this->close();
    }

    /**
     * Attempt to close the FTP connection
     */
    public function close(): void
    {
        if ($this->hasFtpResource()) {
            ftp_close($this->stream);
            $this->stream = null;
        }
    }

    /**
     * Get the names of files in a directory
     *
     * @param string $directory
     *
     * @throws FTPError if there is an error executing the command.
     *
     * @return array
     */
    public function nlist(string $directory = '.'): array
    {
        $result = ftp_nlist($this->getConnection(), $directory);

        if (false === $result) {
            throw new FTPError('Unable to run command.');
        }

        return $result;
    }

    /**
     * Get detailed information about a file or directory
     *
     * @param string $directory
     * @param bool $recursive
     *
     * @throws FTPError if there is an error executing the command.
     *
     * @return array
     */
    public function list(string $directory = '.', bool $recursive = false): array
    {
        $result = ftp_rawlist($this->getConnection(), $directory, $recursive);

        if (false === $result) {
            throw new FTPError('Unable to run command.');
        }

        return $result;
    }

    public function setTimeout(int $timeout)
    {
        if ($timeout < 1) {
            throw new \InvalidArgumentException('Timeout has to be greater than 0');
        }

        $this->options['timeout'] = $timeout;

        if ($this->hasFtpResource()) {
            ftp_set_option($this->getConnection(), FTP_TIMEOUT_SEC, $timeout);
        }
    }

    /**
     * Get an open FTP_Buffer_resource
     *
     * @throws NetworkException if a FTP connection cannot be made
     * @throws NetworkException if the login attempt fails
     *
     * @return resource
     */
    private function getConnection()
    {
        if ($this->hasFtpResource()) {
            return $this->stream;
        }

        $this->connect();

        return $this->stream;
    }

    /**
     * Get an open FTP_Buffer_resource
     *
     * @throws NetworkException if a FTP connection cannot be made
     * @throws FTPError if passive mode cannot be set
     *
     * @return void
     */
    private function connect(): void
    {
        $host = $this->options['host'];
        $port = $this->options['port'];
        $timeout = $this->options['timeout'];

        if ($this->options['ssl'] === false) {
            $connection = ftp_connect($host, $port, $timeout);
        } else {
            $connection = ftp_ssl_connect($host, $port, $timeout);
        }

        if (false === $connection) {
            throw new NetworkException('Unable to connect to server.');
        }

        $this->stream = $connection;
        $this->login();

        if (true === $this->options['passive']) {
            $this->setPassiveMode(true);
        }
    }

    /**
     * Login to the FTP server
     *
     * @throws NetworkException if the login attempt fails
     */
    private function login(): void
    {
        assert($this->hasFtpResource(), 'No FTP connection made');

        $username = $this->options['username'];
        $password = $this->options['password'];

        if (false === ftp_login($this->stream, $username, $password)) {
            throw new NetworkException("Cannot login to {$this->options['host']}");
        }
    }

    /**
     * Login to the FTP server
     *
     * @throws FTPError if passive mode cannot be set
     */
    private function setPassiveMode(bool $mode): void
    {
        assert($this->hasFtpResource(), 'No FTP connection made');

        $result = ftp_pasv($this->stream, $mode);

        if (false === $result) {
            throw new FTPError('Unable to set passive mode. Are you logged in?');
        }
    }

    private function hasFtpResource(): bool
    {
        return is_resource($this->stream) && get_resource_type($this->stream) === 'FTP Buffer';
    }
}
