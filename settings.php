<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Database enrolment plugin settings and presets.
 *
 * @package    enrol_databasegroups
 * @copyright  2010 Petr Skoda {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    //--- general settings -----------------------------------------------------------------------------------
    $settings->add(new admin_setting_heading('enrol_databasegroups_settings', '', get_string('pluginname_desc', 'enrol_databasegroups')));

    $settings->add(new admin_setting_heading('enrol_databasegroups_exdbheader', get_string('settingsheaderdb', 'enrol_databasegroups'), ''));

    $options = array('', "access","ado_access", "ado", "ado_mssql", "borland_ibase", "csv", "db2", "fbsql", "firebird", "ibase", "informix72", "informix", "mssql", "mssql_n", "mssqlnative", "mysql", "mysqli", "mysqlt", "oci805", "oci8", "oci8po", "odbc", "odbc_mssql", "odbc_oracle", "oracle", "postgres64", "postgres7", "postgres", "proxy", "sqlanywhere", "sybase", "vfp");
    $options = array_combine($options, $options);
    $settings->add(new admin_setting_configselect('enrol_databasegroups/dbtype', get_string('dbtype', 'enrol_databasegroups'), get_string('dbtype_desc', 'enrol_databasegroups'), '', $options));

    $settings->add(new admin_setting_configtext('enrol_databasegroups/dbhost', get_string('dbhost', 'enrol_databasegroups'), get_string('dbhost_desc', 'enrol_databasegroups'), 'localhost'));

    $settings->add(new admin_setting_configtext('enrol_databasegroups/dbuser', get_string('dbuser', 'enrol_databasegroups'), '', ''));

    $settings->add(new admin_setting_configpasswordunmask('enrol_databasegroups/dbpass', get_string('dbpass', 'enrol_databasegroups'), '', ''));

    $settings->add(new admin_setting_configtext('enrol_databasegroups/dbname', get_string('dbname', 'enrol_databasegroups'), get_string('dbname_desc', 'enrol_databasegroups'), ''));

    $settings->add(new admin_setting_configtext('enrol_databasegroups/dbencoding', get_string('dbencoding', 'enrol_databasegroups'), '', 'utf-8'));

    $settings->add(new admin_setting_configtext('enrol_databasegroups/dbsetupsql', get_string('dbsetupsql', 'enrol_databasegroups'), get_string('dbsetupsql_desc', 'enrol_databasegroups'), ''));

    $settings->add(new admin_setting_configcheckbox('enrol_databasegroups/dbsybasequoting', get_string('dbsybasequoting', 'enrol_databasegroups'), get_string('dbsybasequoting_desc', 'enrol_databasegroups'), 0));

    $settings->add(new admin_setting_configcheckbox('enrol_databasegroups/debugdb', get_string('debugdb', 'enrol_databasegroups'), get_string('debugdb_desc', 'enrol_databasegroups'), 0));



    $settings->add(new admin_setting_heading('enrol_databasegroups_localheader', get_string('settingsheaderlocal', 'enrol_databasegroups'), ''));

    $options = array('id'=>'id', 'idnumber'=>'idnumber', 'shortname'=>'shortname');
    $settings->add(new admin_setting_configselect('enrol_databasegroups/localcoursefield', get_string('localcoursefield', 'enrol_databasegroups'), '', 'idnumber', $options));

    $options = array('id'=>'id', 'idnumber'=>'idnumber', 'email'=>'email', 'username'=>'username'); // only local users if username selected, no mnet users!
    $settings->add(new admin_setting_configselect('enrol_databasegroups/localuserfield', get_string('localuserfield', 'enrol_databasegroups'), '', 'idnumber', $options));

    $options = array('id'=>'id', 'shortname'=>'shortname');
    $settings->add(new admin_setting_configselect('enrol_databasegroups/localrolefield', get_string('localrolefield', 'enrol_databasegroups'), '', 'shortname', $options));

    $options = array('id'=>'id', 'idnumber'=>'idnumber', 'name' => 'name');
    $settings->add(new admin_setting_configselect('enrol_databasegroups/localgroupfield', get_string('localgroupfield', 'enrol_databasegroups'), '', 'idnumber', $options));

    $options = array('id'=>'id', 'idnumber'=>'idnumber');
    $settings->add(new admin_setting_configselect('enrol_databasegroups/localcategoryfield', get_string('localcategoryfield', 'enrol_databasegroups'), '', 'id', $options));


    $settings->add(new admin_setting_heading('enrol_databasegroups_remoteheader', get_string('settingsheaderremote', 'enrol_databasegroups'), ''));

    $settings->add(new admin_setting_configtext('enrol_databasegroups/remoteenroltable', get_string('remoteenroltable', 'enrol_databasegroups'), get_string('remoteenroltable_desc', 'enrol_databasegroups'), ''));

    $settings->add(new admin_setting_configtext('enrol_databasegroups/remotecoursefield', get_string('remotecoursefield', 'enrol_databasegroups'), get_string('remotecoursefield_desc', 'enrol_databasegroups'), ''));

    $settings->add(new admin_setting_configtext('enrol_databasegroups/remotegroupfield', get_string('remotegroupfield', 'enrol_databasegroups'), get_string('remotegroupfield_desc', 'enrol_databasegroups'), ''));

    $settings->add(new admin_setting_configtext('enrol_databasegroups/remoteuserfield', get_string('remoteuserfield', 'enrol_databasegroups'), get_string('remoteuserfield_desc', 'enrol_databasegroups'), ''));

    $settings->add(new admin_setting_configtext('enrol_databasegroups/remoterolefield', get_string('remoterolefield', 'enrol_databasegroups'), get_string('remoterolefield_desc', 'enrol_databasegroups'), ''));

    if (!during_initial_install()) {
        $options = get_default_enrol_roles(context_system::instance());
        $student = get_archetype_roles('student');
        $student = reset($student);
        $settings->add(new admin_setting_configselect('enrol_databasegroups/defaultrole', get_string('defaultrole', 'enrol_databasegroups'), get_string('defaultrole_desc', 'enrol_databasegroups'), $student->id, $options));
    }

    $settings->add(new admin_setting_configcheckbox('enrol_databasegroups/ignorehiddencourses', get_string('ignorehiddencourses', 'enrol_databasegroups'), get_string('ignorehiddencourses_desc', 'enrol_databasegroups'), 0));

    $options = array(ENROL_EXT_REMOVED_UNENROL        => get_string('extremovedunenrol', 'enrol'),
                     ENROL_EXT_REMOVED_KEEP           => get_string('extremovedkeep', 'enrol'),
                     ENROL_EXT_REMOVED_SUSPEND        => get_string('extremovedsuspend', 'enrol'),
                     ENROL_EXT_REMOVED_SUSPENDNOROLES => get_string('extremovedsuspendnoroles', 'enrol'));
    $settings->add(new admin_setting_configselect('enrol_databasegroups/unenrolaction', get_string('extremovedaction', 'enrol'), get_string('extremovedaction_help', 'enrol'), ENROL_EXT_REMOVED_UNENROL, $options));



    $settings->add(new admin_setting_heading('enrol_databasegroups_newcoursesheader', get_string('settingsheadernewcourses', 'enrol_databasegroups'), ''));

    $settings->add(new admin_setting_configtext('enrol_databasegroups/newcoursetable', get_string('newcoursetable', 'enrol_databasegroups'), get_string('newcoursetable_desc', 'enrol_databasegroups'), ''));

    $settings->add(new admin_setting_configtext('enrol_databasegroups/newcoursefullname', get_string('newcoursefullname', 'enrol_databasegroups'), '', 'fullname'));

    $settings->add(new admin_setting_configtext('enrol_databasegroups/newcourseshortname', get_string('newcourseshortname', 'enrol_databasegroups'), '', 'shortname'));

    $settings->add(new admin_setting_configtext('enrol_databasegroups/newcourseidnumber', get_string('newcourseidnumber', 'enrol_databasegroups'), '', 'idnumber'));

    $settings->add(new admin_setting_configtext('enrol_databasegroups/newcoursecategory', get_string('newcoursecategory', 'enrol_databasegroups'), '', ''));

    if (!during_initial_install()) {
        $settings->add(new admin_setting_configselect('enrol_databasegroups/defaultcategory', get_string('defaultcategory', 'enrol_databasegroups'), get_string('defaultcategory_desc', 'enrol_databasegroups'), 1, make_categories_options()));
    }

    $settings->add(new admin_setting_configtext('enrol_databasegroups/templatecourse', get_string('templatecourse', 'enrol_databasegroups'), get_string('templatecourse_desc', 'enrol_databasegroups'), ''));
}
