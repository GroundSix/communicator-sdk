<?php

namespace GroundSix\Enum\DataService;

use MyCLabs\Enum\Enum;

/**
 * @method static ImportResult FAILED_INSERTING()
 * @method static ImportResult FAILED_UPDATING()
 * @method static ImportResult SUCCESS_INSERTING()
 * @method static ImportResult SUCCESS_UPDATING()
 * @method static ImportResult PRIMARY_KEY_VIOLATION()
 * @method static ImportResult FOREIGN_KEY_VIOLATION()
 * @method static ImportResult COLUMN_MAPPING_FAILURE()
 * @method static ImportResult COLUMNS_NOT_IN_TABLE()
 * @method static ImportResult NO_REQUIRED_COLUMN_IN_TABLE()
 * @method static ImportResult COLUMN_REQUIRED()
 * @method static ImportResult DUPLICATE_COLUMN_MAPPING()
 * @method static ImportResult NO_CHANGE_TO_EXISTING_CONTACT()
 * @method static ImportResult NOT_NULL_VIOLATION()
 * @method static ImportResult UNKNOWN()
 */
class ImportResult extends Enum
{
    const FAILED_INSERTING = 'FailedInserting';
    const FAILED_UPDATING = 'FailedUpdating';
    const SUCCESS_INSERTING = 'SuccessInserting';
    const SUCCESS_UPDATING = 'SuccessUpdating';
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

