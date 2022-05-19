<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];
    public $registerNewEmployee = [
        'name'=>'required|min_length[3]|max_length[60]',
        'lastName1'=>'required|min_length[3]|max_length[60]',
        'lastName2'=>'required|min_length[3]|max_length[60]',
        'employeePhoneNumber'=>'required|alpha_numeric|min_length[7]|max_length[20]',
        'employeeCI'=>'required|alpha_numeric|min_length[7]|max_length[13]',
        'employeeGender'=>'required|alpha_numeric|min_length[7]|max_length[20]',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
}
