Dim WshShell
Set WshShell = CreateObject("WScript.Shell" ) 
WshShell.Run chr(34) & "C:\wamp\www\ACSevents\runSR.bat" & Chr(34), 0 
Set WshShell = Nothing
