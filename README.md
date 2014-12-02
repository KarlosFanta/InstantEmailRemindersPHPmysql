InstantEmailRemindersPHPmysql  (tested in Windows 7)
=============================

Quickly create instant daily or weekly reminders and email them automatically.

This is version 1.0
Setting it up though means creating a task schedule on Windows that fires sendEvents.php every 5 minutes.

The installation manual has not been created yet, so knowledge of PHP can be useful!!!
Because you have to change some php files.

Hopefully by July 2015 this project will look better but it works for now. I use it everyday on Win7.
Set your PHP-mySQL server (eg wamp) to automatically start inside windows Services.
i used wampserver but you may use any mysqlPHP server of your choice.
Schedule the following task:
(Call it reminders) Triggers: Daily At 01:17 Pm every day -After triggered repeat every 5 minutes
Action: start a program: C:\wamp\www\ACSevents\runSendReminder.vbs
this VB script launches a batch file called runSR.bat and it launches it quietly.
runSR.bat then launches sendEvent.php.

It uses 3 tables: once off instant reminders, daily reminders and weekly reminders.
So it's actually quite user friendly.
All MySQL statements are shown so that it is easy to understand and can be quickly modified for any application.


Credit goes to: phpMyEdit and http://www.devarticles.com/c/a/MySQL/Setup-Your-Personal-Reminder-System-Using-PHP/1/
