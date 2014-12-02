InstantEmailRemindersPHPmysql
=============================

Quickly create instant daily or weekly reminders and email them automatically.



THis is version 0.1
This means it's a development version.
but hey it works.
Setting it up though means creating a task schedule on Windows that fires sendEvents.php every 5 minutes.

The installation manual has not been created yet, so knowledge of PHP can be useful!!!

Hopefully by July 2015 this project will look better but it works for now. i use it everyday.
Set your PHP-mySQL server (eg wamp) to automatically start inside windows Services.

Schedule the following task:
(Call it reminders) Triggers: Daily At 01:17 Pm every day -After triggered repeat every 5 minutes
Action: start a program: C:\wamp\www\ACSevents\runSendReminder.vbs

It uses 3 tables: once off instant reminders, daily reminders and weekly reminders.
So it's actually quite user friendly.
All MySQL statements are shown so that it is easy to understand and can be quickly modified for any application.


