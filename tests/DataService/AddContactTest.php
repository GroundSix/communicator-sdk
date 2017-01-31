<?php

namespace GroundSix\Communicator\Test\DataService;

use GroundSix\Communicator\DataService\AddContact;
use GroundSix\Communicator\DataService\DataImporter;
use GroundSix\Communicator\Exceptions\BadResponseFormat;
use GroundSix\Communicator\Exceptions\DataImporterException;
use GroundSix\Communicator\Resources\ColumnMapping;
use GroundSix\Communicator\Resources\DataImport;
use GroundSix\Communicator\Resources\DataRecord;
use GroundSix\Communicator\Resources\Subscription;
use GroundSix\Communicator\Test\TestCase;

class AddContactTest extends TestCase
{
    /** @var AddContact */
    protected $partialMock;

    protected function setUp()
    {
        parent::setUp();
        $this->partialMock = $this->createPartialMock(AddContact::class, ['__construct']);
    }

    /**
     * @test
     */
    public function it_builds_a_DataImporter()
    {
        $addContact = new AddContact(12345, [1234 => 'adam@example.com'], [123, 456]);

        $this->assertInstanceOf(DataImporter::class, $addContact->getRequest());
    }

    /**
     * @test
     * @dataProvider successResults
     *
     * @param string $result
     */
    public function it_returns_true_if_the_import_succeeds($result, $message)
    {
        $soapResponse = $this->getResponse($result, $message);

        $response = $this->partialMock->formatResponse($soapResponse);

        $this->assertTrue($response);
    }

    /**
     * @test
     */
    public function it_throws_an_exception_if_the_response_is_badly_formatted()
    {
        $this->expectException(BadResponseFormat::class);
        $this->expectExceptionMessage('The response from Communicator was not formatted as expected.');

        $this->partialMock->formatResponse(new \stdClass());
    }

    /**
     * @test
     * @dataProvider errorResults
     *
     * @param string $result
     * @param string $message
     * @param int    $code
     */
    public function it_throws_a_DataImporterException_if_the_import_does_not_succeed($result, $message, $code)
    {
        $response = $this->getResponse($result, $message);

        $this->expectException(DataImporterException::class);
        $this->expectExceptionMessage($message);
        $this->expectExceptionCode($code);

        $this->partialMock->formatResponse($response);
    }

    /**
     * @test
     */
    public function it_can_add_subscriptions()
    {
        $expected = new DataImporter(
            new DataImport(1,
                [new DataRecord([new ColumnMapping(1, '')], [new Subscription(1)])]
            )
        );

        $addContact = new AddContact(1, [1 => ''], [1]);
        $dataImporter = $addContact->getRequest();

        $this->assertEquals($expected, $dataImporter);
    }

    public function errorResults()
    {
        return [
            ['FailedInserting', 'Response message', 1 << 0],
            ['FailedUpdating', 'Response message', 1 << 1],
            ['PrimaryKeyViolation', 'An attempt to violate a unique Primary Key column constraint was made', 1 << 2],
            ['ForeignKeyViolation', 'An attempt to violate a Foreign Key column constraint was made', 1 << 3],
            ['ColumnMappingFailure', 'Response message', 1 << 4],
            ['ColumnsNotInTable', 'Response message', 1 << 5],
            ['NoRequiredColumnInTable', 'Response message', 1 << 6],
            ['ColumnRequired', 'Response message', 1 << 7],
            ['DuplicateColumnMapping', 'Response message', 1 << 8],
            ['NotNullViolation', 'An attempt to violate a not null constraint was made', 1 << 9],
            ['Unknown', 'Response message', 1 << 10],
        ];
    }

    public function successResults()
    {
        return [
            ['SuccessInserting', ''],
            ['SuccessUpdating', ''],
            ['NoChangeToExistingContact', ''],
        ];
    }

    protected function getResponse($result, $message)
    {
        $result = [
            'DataImporterResult' => [
                'ImportDetails' => [
                    'DataImportResponseDetail' => [
                        [
                            'Row' => 1,
                            'Result' => $result,
                            'Response' => $message,
                            'Mappings' => [
                                [
                                    'ColumnId' => 1,
                                    'Value' => '',
                                ],
                            ],
                        ],
                    ],
                ],
                'ImportTopLevel' => [
                    'TopLevelDetail' => [
                        'TopLevelDetailItem' => [
                            [
                                'ImportResultType' => 'FailedInserting',
                                'ImportResultCount' => 1,
                            ],
                        ],
                    ],
                ],
            ],
        ];

        return $this->arrayToObject($result);
    }
}
