<?php

namespace GroundSix\Communicator\Enum;

use MyCLabs\Enum\Enum;

class ImportResult extends Enum
{
    const SUCCESS_INSERTING = 'SuccessInserting';
    const SUCCESS_UPDATING = 'SuccessUpdating';
    const FAILED_INSERTING = 'FailedInserting';
    const FAILED_UPDATING = 'FailedUpdating';
    const PRIMARY_KEY_VIOLATION = 'PrimaryKeyViolation';
    const FOREIGN_KEY_VIOLATION = 'ForeignKeyViolation';
    const COLUMN_MAPPING_FAILURE = 'ColumnMappingFailure';
    const COLUMNS_NOT_IN_TABLE = 'ColumnsNotInTable';
    const NO_REQUIRED_COLUMN_IN_TABLE = 'NoRequiredColumnInTable';
    const COLUMN_REQUIRED = 'ColumnRequired';
    const DUPLICATE_COLUMN_MAPPING = 'DuplicateColumnMapping';
    const NO_CHANGE_TO_EXISTING_CONTACT = 'NoChangeToExistingContact';
    const NOT_NULL_VIOLATION = 'NotNullViolation';
    const UNKNOWN = 'Unknown';
}
