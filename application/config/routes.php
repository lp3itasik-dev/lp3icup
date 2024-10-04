<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['regis'] = 'Auth/register';
$route['registration'] = 'Auth/act_regis';
$route['cek'] = 'Auth/login';
$route['scoring'] = 'Auth/history_pertandingan';
$route['teams'] = 'Auth/historyteam';

$route['dashboard'] = 'Peserta/index';
$route['data'] = 'Peserta/data_diri';
// $route['anggota'] = 'Peserta/actadd_anggota';
$route['history_tournament'] = 'Peserta/history';
$route['tanggal_tournament'] = 'Peserta/history_tanggal';
$route['tanggal_filter_tournament'] = 'Peserta/history_tgl_filter';
$route['match_history_tournament'] = 'Peserta/history_match';
$route['team_tournament'] = 'Peserta/history_team';
$route['team_history_tournament'] = 'Peserta/historyteam';

$route['beranda'] = 'Admin/index';
$route['rundown'] = 'Admin/match';
$route['tamb_matching'] = 'Admin/act_match';
$route['tournament'] = 'Admin/pertandingan';
$route['score_input'] = 'Admin/page_score_input';
$route['score_match'] = 'Admin/act_score_match';
$route['score_finish'] = 'Admin/act_score';
$route['history'] = 'Admin/history_pertandingan';
$route['tanggal'] = 'Admin/history_tanggal';
$route['tanggal_filter'] = 'Admin/history_tgl_filter';
$route['match_history'] = 'Admin/history_match';
$route['team'] = 'Admin/history_team';
$route['team_history'] = 'Admin/historyteam';
$route['data_team'] = 'Admin/team';
$route['tamb_team'] = 'Admin/t_team';
$route['data_diri_team'] = 'Admin/datdir_team';
$route['anggota'] = 'Admin/actad_anggota';


$route['default_controller'] = 'Auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
