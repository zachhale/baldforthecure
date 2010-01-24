<?php defined('SYSPATH') OR die('No direct access allowed.');

require_once(Kohana::find_file('libraries', 'twitteroauth', TRUE, 'php'));

/**
 * Default Kohana controller. This controller should NOT be used in production.
 * It is for demonstration purposes only!
 *
 * @package    Core
 * @author     Kohana Team
 * @copyright  (c) 2007-2008 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
class Welcome_Controller extends Common_Controller {
	#public $template = 'template';

	public function index()
	{
		$this->template->title = 'The Latest';
		
		$this->template->content = new View('welcome/index');
		$this->template->content->title = "The Latest";
		$this->template->content->updates = $this->latestUpdates();
		
		$this->template->content->city_leader = new View('widgets/leaderboard');
		$this->template->content->city_leader->type = "Best Cities";
		$this->template->content->city_leader->total_type = "Cash Raised";
		$this->template->content->city_leader->leaders = array(
			array('XXXX, WW', 34999), array('YYY, ZZ', 34000),
			array('AAAAA, BB', 1200), array('SSS, TT', 350)
		);
		
		$this->template->content->people_leader = new View('widgets/leaderboard');
		$this->template->content->people_leader->type = "Best Fundraisers";
		$this->template->content->people_leader->total_type = "Cash Raised";
		$this->template->content->people_leader->leaders = array(
			array('Jill', 1200), array('Jack', 300), array('Mohamud', 290),
			array('Pedro', 200)
		);
		
		$this->template->content->recruit_leader = new View('widgets/leaderboard');
		$this->template->content->recruit_leader->type = "Best Recruiters";
		$this->template->content->recruit_leader->total_type = "Recruits";
		$this->template->content->recruit_leader->leaders = array(
			array('Jill', 12), array('Jack', 11), array('Mohamud', 11),
			array('Pedro', 8)
		);
		
		/*
		$top_cities = new View('widgets/leaderboard');
		$top_cities->type = "Cities";
		$this->template->top_cities = $top_cities;
		*/
		
	}

	public function latestUpdates()
	{
		$limit = 10;
		return $users = ORM::factory('user')->orderby('created', 'DESC')->find_all($limit);
	}

}