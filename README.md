# Android APK Permission Generator
This project helps to generate privileged/signature permissions xml, default permissions xml for system applications

# Usage
```
bin/run [path_to_apk_file]
```

# Output example
```
Privileged, signature permissions file put into /system/etc/permissions/[package_name].xml:

<?xml version="1.0" encoding="utf-8"?>
<!-- This XML file declares which signature|privileged permissions to grant to privileged apps that come with the platform -->
<permissions>
    <privapp-permissions package="com.android.dialer">
        <permission name="android.permission.ALLOW_ANY_CODEC_FOR_PLAYBACK"/>
        <permission name="android.permission.CAPTURE_AUDIO_OUTPUT"/>
        <permission name="android.permission.CONNECTIVITY_USE_RESTRICTED_NETWORKS"/>
        <permission name="android.permission.CONTROL_INCALL_EXPERIENCE"/>
        <permission name="android.permission.GET_ACCOUNTS_PRIVILEGED"/>
        <permission name="android.permission.MODIFY_PHONE_STATE"/>
        <permission name="android.permission.READ_PRIVILEGED_PHONE_STATE"/>
        <permission name="android.permission.STATUS_BAR"/>
        <permission name="android.permission.STOP_APP_SWITCHES"/>
        <permission name="android.permission.SYSTEM_ALERT_WINDOW"/>
        <permission name="android.permission.WRITE_SETTINGS"/>
        <permission name="com.android.voicemail.permission.READ_VOICEMAIL"/>
        <permission name="com.android.voicemail.permission.WRITE_VOICEMAIL"/>
    </privapp-permissions>
</permissions>

Dangerous permissions can be enabled by default by puting into /system/etc/default-permissions/[package_name].xml:

<?xml version="1.0" encoding="utf-8"?>
<exceptions>
    <exception package="com.android.dialer">
        <permission name="android.permission.ACCESS_COARSE_LOCATION" fixed="false"/>
        <permission name="android.permission.ACCESS_FINE_LOCATION" fixed="false"/>
        <permission name="android.permission.CALL_PHONE" fixed="false"/>
        <permission name="android.permission.CAMERA" fixed="false"/>
        <permission name="android.permission.GET_ACCOUNTS" fixed="false"/>
        <permission name="android.permission.PROCESS_OUTGOING_CALLS" fixed="false"/>
        <permission name="android.permission.READ_CALL_LOG" fixed="false"/>
        <permission name="android.permission.READ_CONTACTS" fixed="false"/>
        <permission name="android.permission.READ_EXTERNAL_STORAGE" fixed="false"/>
        <permission name="android.permission.READ_PHONE_STATE" fixed="false"/>
        <permission name="android.permission.RECORD_AUDIO" fixed="false"/>
        <permission name="android.permission.SEND_SMS" fixed="false"/>
        <permission name="android.permission.WRITE_CALL_LOG" fixed="false"/>
        <permission name="android.permission.WRITE_CONTACTS" fixed="false"/>
        <permission name="android.permission.WRITE_EXTERNAL_STORAGE" fixed="false"/>
        <permission name="com.android.voicemail.permission.ADD_VOICEMAIL" fixed="false"/>
    </privapp-permissions>
</exceptions>
```
