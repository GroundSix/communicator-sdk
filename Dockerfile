FROM php:7.1-alpine

RUN apk add --no-cache libxml2-dev

RUN docker-php-ext-install -j$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) soap

RUN EXPECTED_SIGNATURE=$(curl https://composer.github.io/installer.sig); \
  php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"; \
  ACTUAL_SIGNATURE=$(php -r "echo hash_file('SHA384', 'composer-setup.php');"); \
  if [ "$EXPECTED_SIGNATURE" = "$ACTUAL_SIGNATURE" ]; then \
      php composer-setup.php --install-dir=/usr/bin --filename=composer --quiet; \
      RESULT=$?; \
      rm composer-setup.php; \
      exit $RESULT; \
  else\
      >&2 echo "ERROR: Invalid installer signature, got $ACTUAL_SIGNATURE expected $EXPECTED_SIGNATURE"; \
      rm composer-setup.php; \
      exit 1; \
  fi
