<?php

$finder = PhpCsFixer\Finder::create()
    ->in('src');

$config = new PhpCsFixer\Config();
return $config->setRules([
    '@PSR2' => true,
    'align_multiline_comment' => [
        'comment_type' => 'phpdocs_only'
    ],
    'array_indentation' => true,
    'array_syntax' => [
        'syntax' => 'short'
    ],
    'binary_operator_spaces' => [
        'default' => 'single_space',
        'operators' => [
            '=>' => 'align_single_space_minimal',
        ]
    ],
    'blank_line_after_opening_tag' => true,
    'blank_line_before_statement' => [
        'statements' => [
            'case', 'declare', 'default', 'try',
        ],
    ],
    'cast_spaces' => [
        'space' => 'single',
    ],
    'class_attributes_separation' => [
        'elements' => [
            'method' => 'one',
            'property' => 'one',
        ],
    ],
    'combine_consecutive_issets' => true,
    'combine_consecutive_unsets' => true,
    'compact_nullable_type_declaration' => true,
    'concat_space' => [
        'spacing' => 'one',
    ],
    'declare_equal_normalize' => [
        'space' => 'none',
    ],
    'declare_strict_types' => true,
    'dir_constant' => true,
    'ereg_to_preg' => true,
    'explicit_indirect_variable' => true,
    'explicit_string_variable' => true,
    'fully_qualified_strict_types' => true,
    'function_to_constant' => [
        'functions' => [
            'get_called_class', 'get_class', 'php_sapi_name', 'phpversion', 'pi',
        ],
    ],
    'type_declaration_spaces' => ['elements' => ['function', 'property']],
    'heredoc_to_nowdoc' => true,
    'implode_call' => true,
    'include' => true,
    'increment_style' => [
        'style' => 'post',
    ],
    'is_null' => true,
    'linebreak_after_opening_tag' => true,
    'list_syntax' => [
        'syntax' => 'short',
    ],
    'logical_operators' => true,
    'lowercase_cast' => true,
    'lowercase_static_reference' => true,
    'magic_constant_casing' => true,
    'magic_method_casing' => true,
    'method_chaining_indentation' => true,
    'modernize_types_casting' => true,
    'multiline_comment_opening_closing' => true,
    'multiline_whitespace_before_semicolons' => [
        'strategy' => 'no_multi_line',
    ],
    'native_function_casing' => true,
    'native_type_declaration_casing' => true,
    'new_with_parentheses' => true,
    'no_alternative_syntax' => true,
    'no_binary_string' => true,
    'no_blank_lines_after_class_opening' => true,
    'no_blank_lines_after_phpdoc' => true,
    'no_empty_comment' => true,
    'no_empty_phpdoc' => true,
    'no_empty_statement' => true,
    'no_extra_blank_lines' => true,
    'no_homoglyph_names' => true,
    'no_leading_import_slash' => true,
    'no_leading_namespace_whitespace' => true,
    'no_mixed_echo_print' => [
        'use' => 'echo',
    ],
    'no_short_bool_cast' => true,
    'no_singleline_whitespace_before_semicolons' => true,
    'no_spaces_around_offset' => [
        'positions' => [
            'inside', 'outside',
        ],
    ],
    'no_superfluous_phpdoc_tags' => [
        'allow_mixed' => true,
        'allow_unused_params' => false,
        'remove_inheritdoc' => false,
    ],
    'no_trailing_comma_in_singleline' => [
        'elements'=>[
            'arguments',
            'array',
            'array_destructuring',
            'group_import'
        ]
    ],
    'no_unneeded_braces' => ['namespaces' => true],
    'no_unneeded_final_method' => true,
    'no_unset_cast' => true,
    'no_unset_on_property' => true,
    'no_unused_imports' => true,
    'no_useless_else' => true,
    'no_useless_return' => true,
    'no_whitespace_before_comma_in_array' => true,
    'no_whitespace_in_blank_line' => true,
    'non_printable_character' => [
        'use_escape_sequences_in_strings' => true,
    ],
    'normalize_index_brace' => true,
    'nullable_type_declaration_for_default_null_value' => [
        'use_nullable_type_declaration' => false,
    ],
    'object_operator_without_whitespace' => true,
    'ordered_imports' => [
        'sort_algorithm' => 'alpha',
    ],
    'phpdoc_add_missing_param_annotation' => [
        'only_untyped' => false,
    ],
    'phpdoc_indent' => true,
    'phpdoc_line_span' => [
        'const' => 'multi',
        'method' => 'multi',
        'property' => 'multi',
    ],
    'phpdoc_no_access' => true,
    'phpdoc_no_alias_tag' => true,
    'phpdoc_no_empty_return' => true,
    'phpdoc_no_package' => true,
    'phpdoc_no_useless_inheritdoc' => true,
    'phpdoc_return_self_reference' => true,
    'phpdoc_scalar' => [
        'types' => [
            'boolean', 'callback', 'double', 'integer', 'real', 'str',
        ],
    ],
    'phpdoc_summary' => true,
    'phpdoc_to_comment' => true,
    'phpdoc_trim' => true,
    'phpdoc_trim_consecutive_blank_line_separation' => true,
    'phpdoc_types' => true,
    'phpdoc_var_without_name' => true,
    'pow_to_exponentiation' => true,
    'psr_autoloading' => true,
    'random_api_migration' => true,
    'return_type_declaration' => [
        'space_before' => 'none',
    ],
    'set_type_to_cast' => true,
    'short_scalar_cast' => true,
    'simple_to_complex_string_variable' => true,
    'blank_lines_before_namespace' => ['min_line_breaks' => 2, 'max_line_breaks' => 2],
    'single_line_comment_style' => true,
    'space_after_semicolon' => [
        'remove_in_empty_for_expressions' => true,
    ],
    'standardize_increment' => true,
    'standardize_not_equals' => true,
    'ternary_operator_spaces' => true,
    'ternary_to_null_coalescing' => true,
    'trailing_comma_in_multiline' =>  ['elements' => ['arrays']],
    'trim_array_spaces' => true,
    'unary_operator_spaces' => true,
    'void_return' => true,
    'whitespace_after_comma_in_array' => true,
    ])->setFinder($finder);
