<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $register = [
		'name' => ['rules' => 'required|min_length[3]|max_length[20]',],
	'email' => [
		'rules' => 'required|valid_email|is_unique[users.email]',
	],
	'password' => [
		'rules' => 'required|min_length[8]|max_length[255]',
	],
	'mobile' => [
		'rules' => 'required|is_unique[users.mobile]',
	]
	];

	public $manager_signup = [
		'name' => ['rules' => 'required|min_length[3]|max_length[20]',],
	'email' => [
		'rules' => 'required|valid_email|is_unique[team_manager_tbl.email]',
	],
	'password' => [
		'rules' => 'required|min_length[8]|max_length[255]',
	],
	'mobile' => [
		'rules' => 'required|is_unique[team_manager_tbl.mobile]',
	]
	];

	public $login = [
	'email' => [
		'rules' => 'required|valid_email',
	],
	'password' => [
		'rules' => 'required|min_length[8]|max_length[255]',
	]
	];

	public $myaccount_validation = [
		'id' => ['rules' => 'required'],
		'name' => ['rules' => 'required|min_length[3]|max_length[20]',],
		'email' => ['rules' => 'required|valid_email',],
		'address_one' => ['rules' => 'required',],
		'mobile' => ['rules' => 'required',],
		'town' => ['rules' => 'required',],
		'postcode' => ['rules' => 'required']
	];

	public $team_details = [
		'team_name' => [
			'rules' => 'required',
		],
		'team_manager_name' => [
			'rules' => 'required',
		],
		'team_manager_email' => [
			'rules' => 'required|valid_email|is_unique[teams.team_manager_email]',
		]
		];
}
