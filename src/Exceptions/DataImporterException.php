<?php

namespace GroundSix\Communicator\Exceptions;

use RuntimeException;

class DataImporterException extends RuntimeException
{
    const FAILED_INSERTING = 1 << 0;
    const FAILED_UPDATING = 1 << 1;
    const PRIMARY_KEY_VIOLATION = 1 << 2;
    const FOREIGN_KEY_VIOLATION = 1 << 3;
    const COLUMN_MAPPING_FAILURE = 1 << 4;
    const COLUMNS_NOT_IN_TABLE = 1 << 5;
    const NO_REQUIRED_COLUMN_IN_TABLE = 1 << 6;
    const COLUMN_REQUIRED = 1 << 7;
    const DUPLICATE_COLUMN_MAPPING = 1 << 8;
    const NOT_NULL_VIOLATION = 1 << 9;
    const UNKNOWN = 1 << 10;

    const STATUS_CODE_MAP = [
        'FailedInserting' => self::FAILED_INSERTING,
        'FailedUpdating' => self::FAILED_UPDATING,
        'PrimaryKeyViolation' => self::PRIMARY_KEY_VIOLATION,
        'ForeignKeyViolation' => self::FOREIGN_KEY_VIOLATION,
        'ColumnMappingFailure' => self::COLUMN_MAPPING_FAILURE,
        'ColumnsNotInTable' => self::COLUMNS_NOT_IN_TABLE,
        'NoRequiredColumnInTable' => self::NO_REQUIRED_COLUMN_IN_TABLE,
        'ColumnRequired' => self::COLUMN_REQUIRED,
        'DuplicateColumnMapping' => self::DUPLICATE_COLUMN_MAPPING,
        'NotNullViolation' => self::NOT_NULL_VIOLATION,
        'Unknown' => self::UNKNOWN,
    ];
}
