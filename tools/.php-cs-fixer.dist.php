<?php declare(strict_types=1);

/*
 * This file is part of the Webcore package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'config/path.php';

$header = <<<'EOF'
    This file is part of the Webcore package.

    (c) Kristian Koribsky <kristian.koribsky@gmail.com>

    For the full copyright and license information, please view the LICENSE
    file that was distributed with this source code.
    EOF;

$rules = [
    // DEFAULT RULESETS

    '@PSR12' => true,
    '@PSR12:risky' => true,
    '@PHP82Migration' => true,
    '@PHP80Migration:risky' => true,
    '@PHPUnit100Migration:risky' => true,
    '@Symfony' => true,
    '@Symfony:risky' => true,
    '@PhpCsFixer' => true,
    '@PhpCsFixer:risky' => true,

    // CUSTOM RULESET USING ALL BUT DEPRECATED OPTIONS

    // Alias
    'array_push' => true,
    'backtick_to_shell_exec' => true,
    'ereg_to_preg' => true,
    'mb_str_functions' => false,
    'modernize_strpos' => true,
    'no_alias_functions' => true,
    'no_alias_language_construct_call' => true,
    'no_mixed_echo_print' => true,
    'pow_to_exponentiation' => true,
    'random_api_migration' => false,

    // Array Notation
    'set_type_to_cast' => true,
    'array_syntax' => ['syntax' => 'short'],
    'no_multiline_whitespace_around_double_arrow' => true,
    'no_whitespace_before_comma_in_array' => true,
    'normalize_index_brace' => true,
    'trim_array_spaces' => true,
    'whitespace_after_comma_in_array' => true,

    // Basic
    'curly_braces_position' => ['allow_single_line_anonymous_functions' => true, 'allow_single_line_empty_anonymous_classes' => true],
    'encoding' => true,
    'no_multiple_statements_per_line' => true,
    'no_trailing_comma_in_singleline' => true,
    'non_printable_character' => true,
    'octal_notation' => true,
    'psr_autoloading' => ['dir' => $dirSrc],
    'single_line_empty_body' => true,

    // Casing
    'class_reference_name_casing' => true,
    'constant_case' => true,
    'integer_literal_case' => true,
    'lowercase_keywords' => true,
    'lowercase_static_reference' => true,
    'magic_constant_casing' => true,
    'magic_method_casing' => true,
    'native_function_casing' => true,
    'native_function_type_declaration_casing' => true,

    // Cast Notation
    'cast_spaces' => ['space' => 'single'],
    'lowercase_cast' => true,
    'modernize_types_casting' => true,
    'no_short_bool_cast' => true,
    'no_unset_cast' => true,
    'short_scalar_cast' => true,

    // Class Notation
    'class_attributes_separation' => true,
    'class_definition' => ['single_line' => true],
    'final_class' => false,
    'final_internal_class' => true,
    'final_public_method_for_abstract_class' => true,
    'no_blank_lines_after_class_opening' => true,
    'no_null_property_initialization' => true,
    'no_php4_constructor' => true,
    'no_unneeded_final_method' => true,
    'ordered_class_elements' => [
        'order' => ['use_trait', 'case', 'constant_public', 'constant_protected', 'constant_private', 'property_public', 'property_protected', 'property_private', 'construct', 'destruct', 'magic', 'phpunit', 'method_public', 'method_protected', 'method_private'],
        'sort_algorithm' => 'none',
        'case_sensitive' => true,
    ],

    'ordered_interfaces' => ['order' => 'alpha', 'direction' => 'ascend'],
    'ordered_traits' => true,
    'ordered_types' => true,
    'protected_to_private' => true,
    'self_accessor' => true,
    'self_static_accessor' => true,
    'single_class_element_per_statement' => true,
    'single_trait_insert_per_statement' => true,
    'visibility_required' => true,

    // Class Usage
    'date_time_immutable' => true,

    // Comment
    'comment_to_phpdoc' => true,
    'header_comment' => ['header' => $header],
    'multiline_comment_opening_closing' => true,
    'no_empty_comment' => true,
    'no_trailing_whitespace_in_comment' => true,
    'single_line_comment_spacing' => true,
    'single_line_comment_style' => true,

    // Constant Notation
    'native_constant_invocation' => ['fix_built_in' => true, 'include' => ['DIRECTORY_SEPARATOR', 'PHP_INT_SIZE', 'PHP_SAPI', 'PHP_VERSION_ID'], 'scope' => 'all', 'strict' => true],

    // Control Structure
    'control_structure_braces' => true,
    'control_structure_continuation_position' => true,
    'elseif' => true,
    'empty_loop_body' => true,
    'empty_loop_condition' => true,
    'include' => true,
    'no_alternative_syntax' => true,
    'no_break_comment' => true,
    'no_superfluous_elseif' => true,
    'no_unneeded_control_parentheses' => ['statements' => ['break', 'clone', 'continue', 'echo_print', 'negative_instanceof', 'others', 'return', 'switch_case', 'yield', 'yield_from']],
    'no_unneeded_curly_braces' => ['namespaces' => true],
    'no_useless_else' => true,
    'simplified_if_return' => true,
    'switch_case_semicolon_to_colon' => true,
    'switch_case_space' => true,
    'switch_continue_to_break' => true,
    'trailing_comma_in_multiline' => true,
    'yoda_style' => ['equal' => false, 'identical' => false, 'less_and_greater' => false],

    // Doctrine Annotation
    'doctrine_annotation_array_assignment' => ['operator' => ':'],
    'doctrine_annotation_braces' => true,
    'doctrine_annotation_indentation' => true,
    'doctrine_annotation_spaces' => ['before_array_assignments_colon' => false],

    // Function Notation
    'combine_nested_dirname' => true,
    'date_time_create_from_format_call' => true,
    'fopen_flag_order' => true,
    'fopen_flags' => ['b_mode' => false],
    'function_declaration' => true,
    'implode_call' => true,
    'lambda_not_used_import' => true,
    'method_argument_space' => true,
    'native_function_invocation' => ['include' => ['@all'], 'scope' => 'all', 'strict' => true],
    'no_spaces_after_function_name' => true,
    'no_unreachable_default_argument_value' => true,
    'no_useless_sprintf' => true,
    'nullable_type_declaration_for_default_null_value' => true,
    'phpdoc_to_param_type' => true,
    'phpdoc_to_property_type' => true,
    'phpdoc_to_return_type' => true,
    'regular_callable_call' => true,
    'return_type_declaration' => true,
    'single_line_throw' => true,
    'static_lambda' => true,
    'use_arrow_functions' => true,
    'void_return' => true,

    // Import
    'fully_qualified_strict_types' => true,
    'global_namespace_import' => ['import_classes' => false, 'import_constants' => false, 'import_functions' => false],
    'group_import' => false,
    'no_leading_import_slash' => true,
    'no_unneeded_import_alias' => true,
    'no_unused_imports' => true,
    'ordered_imports' => ['imports_order' => ['class', 'function', 'const'], 'sort_algorithm' => 'alpha'],
    'single_import_per_statement' => ['group_to_single_imports' => false],
    'single_line_after_imports' => true,

    // Language Construct
    'combine_consecutive_issets' => true,
    'combine_consecutive_unsets' => true,
    'declare_equal_normalize' => true,
    'declare_parentheses' => true,
    'dir_constant' => true,
    'error_suppression' => false,
    'explicit_indirect_variable' => true,
    'function_to_constant' => true,
    'get_class_to_class_keyword' => true,
    'is_null' => true,
    'no_unset_on_property' => true,
    'single_space_around_construct' => true,

    // List Notation
    'list_syntax' => true,

    // Namespace Notation
    'blank_line_after_namespace' => true,
    'blank_lines_before_namespace' => true,
    'clean_namespace' => true,
    'no_leading_namespace_whitespace' => true,

    // Naming
    'no_homoglyph_names' => true,

    // Operator
    'assign_null_coalescing_to_coalesce_equal' => true,
    'binary_operator_spaces' => true,
    'concat_space' => ['spacing' => 'one'],
    'increment_style' => true,
    'logical_operators' => true,
    'new_with_braces' => true,
    'no_space_around_double_colon' => true,
    'no_useless_concat_operator' => true,
    'no_useless_nullsafe_operator' => true,
    'not_operator_with_space' => true,
    'not_operator_with_successor_space' => true,
    'object_operator_without_whitespace' => true,
    'operator_linebreak' => true,
    'standardize_increment' => true,
    'standardize_not_equals' => true,
    'ternary_operator_spaces' => true,
    'ternary_to_elvis_operator' => true,
    'ternary_to_null_coalescing' => true,
    'unary_operator_spaces' => true,

    // PHP Tag
    'blank_line_after_opening_tag' => true,
    'echo_tag_syntax' => true,
    'full_opening_tag' => true,
    'linebreak_after_opening_tag' => true,
    'no_closing_tag' => true,

    // PHPUnit
    'php_unit_construct' => true,
    // 'php_unit_data_provider_name' => ['prefix' => 'provide', 'suffix' => 'Cases'],
    'php_unit_data_provider_name' => false,
    'php_unit_data_provider_static' => ['force' => true],
    'php_unit_dedicate_assert' => true,
    'php_unit_dedicate_assert_internal_type' => true,
    'php_unit_expectation' => true,
    'php_unit_fqcn_annotation' => true,
    'php_unit_internal_class' => true,
    'php_unit_method_casing' => true,
    'php_unit_mock' => true,
    'php_unit_mock_short_will_return' => true,
    'php_unit_namespaced' => true,
    'php_unit_no_expectation_annotation' => true,
    'php_unit_set_up_tear_down_visibility' => true,
    'php_unit_size_class' => true,
    'php_unit_strict' => true,
    'php_unit_test_annotation' => true,
    'php_unit_test_case_static_method_calls' => ['call_type' => 'this'],
    'php_unit_test_class_requires_covers' => true,

    // PHPDoc
    'align_multiline_comment' => true,
    'general_phpdoc_annotation_remove' => true,
    'general_phpdoc_tag_rename' => true,
    'no_blank_lines_after_phpdoc' => true,
    'no_empty_phpdoc' => true,
    'no_superfluous_phpdoc_tags' => true,
    'phpdoc_add_missing_param_annotation' => true,
    'phpdoc_align' => true,
    'phpdoc_annotation_without_dot' => true,
    'phpdoc_indent' => true,
    'phpdoc_inline_tag_normalizer' => true,
    'phpdoc_line_span' => true,
    'phpdoc_no_access' => true,
    'phpdoc_no_alias_tag' => true,
    'phpdoc_no_empty_return' => true,
    'phpdoc_no_package' => true,
    'phpdoc_no_useless_inheritdoc' => true,
    'phpdoc_order_by_value' => true,
    'phpdoc_order' => ['order' => ['param', 'return', 'throws']],
    'phpdoc_param_order' => true,
    'phpdoc_return_self_reference' => true,
    'phpdoc_scalar' => true,
    'phpdoc_separation' => true,
    'phpdoc_single_line_var_spacing' => true,
    'phpdoc_summary' => true,
    'phpdoc_tag_casing' => true,
    'phpdoc_tag_type' => ['tags' => ['inheritDoc' => 'inline']],
    'phpdoc_to_comment' => true,
    'phpdoc_trim_consecutive_blank_line_separation' => true,
    'phpdoc_trim' => true,
    'phpdoc_types' => true,
    'phpdoc_types_order' => true,
    'phpdoc_var_annotation_correct_order' => true,
    'phpdoc_var_without_name' => true,

    // Return Notation
    'no_useless_return' => true,
    'return_assignment' => true,
    'simplified_null_return' => true,

    // Semicolon
    'multiline_whitespace_before_semicolons' => ['strategy' => 'new_line_for_chained_calls'],
    'no_empty_statement' => true,
    'no_singleline_whitespace_before_semicolons' => true,
    'semicolon_after_instruction' => true,
    'space_after_semicolon' => true,

    // Strict
    'declare_strict_types' => true,
    'strict_comparison' => true,
    'strict_param' => true,

    // String Notation
    'escape_implicit_backslashes' => true,
    'explicit_string_variable' => true,
    'heredoc_to_nowdoc' => true,
    'no_binary_string' => true,
    'no_trailing_whitespace_in_string' => true,
    'simple_to_complex_string_variable' => true,
    'single_quote' => true,
    'string_length_to_empty' => true,
    'string_line_ending' => true,

    // Whitespace
    'array_indentation' => true,
    'blank_line_before_statement' => ['statements' => ['break', 'case', 'continue', 'declare', 'default', 'do', 'exit', 'for', 'foreach', 'goto', 'if', 'include', 'include_once', 'phpdoc', 'require', 'require_once', 'return', 'switch', 'throw', 'try', 'while', 'yield', 'yield_from']],
    'blank_line_between_import_groups' => true,
    'compact_nullable_typehint' => true,
    'heredoc_indentation' => true,
    'indentation_type' => true,
    'line_ending' => true,
    'method_chaining_indentation' => true,
    'no_extra_blank_lines' => ['tokens' => ['attribute', 'break', 'case', 'continue', 'curly_brace_block', 'default', 'extra', 'parenthesis_brace_block', 'return', 'square_brace_block', 'switch', 'throw', 'use']],
    'no_spaces_around_offset' => true,
    'no_spaces_inside_parenthesis' => true,
    'no_trailing_whitespace' => true,
    'no_whitespace_in_blank_line' => true,
    'single_blank_line_at_eof' => true,
    'statement_indentation' => true,
    'types_spaces' => true,
];

$customRules = [
    PhpCsFixerCustomFixers\Fixer\CommentSurroundedBySpacesFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\CommentedOutFunctionFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\ConstructorEmptyBracesFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\DataProviderReturnTypeFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\DeclareAfterOpeningTagFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\EmptyFunctionBodyFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\IssetToArrayKeyExistsFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\MultilineCommentOpeningClosingAloneFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\MultilinePromotedPropertiesFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\NoCommentedOutCodeFixer::name() => false,
    PhpCsFixerCustomFixers\Fixer\NoDoctrineMigrationsGeneratedCommentFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\NoDuplicatedArrayKeyFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\NoDuplicatedImportsFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\NoImportFromGlobalNamespaceFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\NoLeadingSlashInGlobalNamespaceFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\NoNullableBooleanTypeFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\NoPhpStormGeneratedCommentFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\NoReferenceInFunctionDefinitionFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\NoSuperfluousConcatenationFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\NoTrailingCommaInSinglelineFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\NoUselessCommentFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\NoUselessDirnameCallFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\NoUselessDoctrineRepositoryCommentFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\NoUselessParenthesisFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\NoUselessStrlenFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\NumericLiteralSeparatorFixer::name() => false,
    PhpCsFixerCustomFixers\Fixer\PhpUnitAssertArgumentsOrderFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\PhpUnitDedicatedAssertFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\PhpUnitNoUselessReturnFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\PhpdocArrayStyleFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\PhpdocNoIncorrectVarAnnotationFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\PhpdocNoSuperfluousParamFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\PhpdocOnlyAllowedAnnotationsFixer::name() => [],
    PhpCsFixerCustomFixers\Fixer\PhpdocParamTypeFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\PhpdocSelfAccessorFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\PhpdocSingleLineVarFixer::name() => false,
    PhpCsFixerCustomFixers\Fixer\PhpdocTypesCommaSpacesFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\PhpdocTypesTrimFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\PhpdocVarAnnotationToAssertFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\PromotedConstructorPropertyFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\ReadonlyPromotedPropertiesFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\SingleSpaceAfterStatementFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\SingleSpaceBeforeStatementFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\StringableInterfaceFixer::name() => true,
];

$finder = PhpCsFixer\Finder::create()
    ->files()
    ->name('*.php')
    ->in($dirSrc)
    ->append([__FILE__])
;

$config = (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setUsingCache(true)
    ->setCacheFile($dirCache)
    ->registerCustomFixers(new PhpCsFixerCustomFixers\Fixers())
    ->setRules(\array_merge($rules, $customRules))
    ->setFinder($finder)
;

return $config;
