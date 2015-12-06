## IPcamera-API
php files to send and receive IP camera data

###[Getters]

####check_user.php
Gain current user verification result.
#####syntax:
check_user.php?user=admin&pwd=admin&ip=192.168.2.12

#####returns:
{"Data":{"user":"'admin'","pwd":"'admin'","pri":""}}

param  | value
------------- | -------------
user: |Current user  
pwd: |Current password 
pri: |1: Visitor / 2: Operator / 3: Superintende

-------------

####get_camera_params.php
Gain camera parameter establishment
#####syntax:
get_camera_params.php?user=admin&pwd=admin&ip=192.168.2.12

#####returns:
{"Data":{"resolution":"32","brightness":"112","contrast":"3","mode":"1","flip":"3","fps":"0"}}

#####linked class:
camera_control.php

-------------

####get_forbidden.php
Get the camera view audio and video information is prohibited.
#####syntax:
get_forbidden.php?user=admin&pwd=admin&ip=192.168.2.12

#####returns:
{"Data":{"schedule_enable":"0","schedule_sun_0":"0","schedule_sun_1":"0","schedule_sun_2":"0","schedule_mon_0":"0","schedule_mon_1":"0","schedule_mon_2":"0","schedule_tue_0":"0","schedule_tue_1":"0","schedule_tue_2":"0","schedule_wed_0":"0","schedule_wed_1":"0","schedule_wed_2":"0","schedule_thu_0":"0","schedule_thu_1":"0","schedule_thu_2":"0","schedule_fri_0":"0","schedule_fri_1":"0","schedule_fri_2":"0","schedule_sat_0":"0","schedule_sat_1":"0","schedule_sat_2":"0"}}

------------

####get_log.php
Get the camera logs
#####syntax:
get_log.php?user=admin&pwd=admin&ip=192.168.2.12

#####returns:
{"Data":{"log_text":"'"}}

------------

####get_misc.php
Gain miscellaneous parameters for the camera.
#####syntax:
get_misc.php?user=admin&pwd=admin&ip=192.168.2.12

#####returns:
{"Data":{"led_mode":"0","ptz_center_onstart":"0","ptz_auto_patrol_interval":"0","ptz_auto_patrol_type":"0","ptz_patrol_h_rounds":"0","ptz_patrol_v_rounds":"0","ptz_patrol_rate":"0","ptz_preset_rate":"1","ptz_patrol_up_rate":"2","ptz_patrol_down_rate":"2","ptz_patrol_left_rate":"2","ptz_patrol_right_rate":"2","ptz_disable_preset":"0","ptz_preset_onstart":"1"}}

------------

####get_params.php
Gain device parameters set.
#####syntax:
get_misc.php?user=admin&pwd=admin&ip=192.168.2.12

#####returns:
{"Data":{"id":"'001122334455'","sys_ver":"'1.2.3.4'","app_ver":"'4.5.6.7'","alias":"'name'","now":"1234567890","tz":"0","daylight_saving_time":"0","ntp_enable":"1","ntp_svr":"'time.nist.gov'","user1_name":"'admin'","user1_pwd":"'admin'" }}

<i>Note: The full return is much longer</i>

------------

####get_status.php
Gain device status. (the short version of get_params.php.)
#####syntax:
get_status.php?user=admin&pwd=admin&ip=192.168.2.12

#####returns:
{"Data":{"id":"'001122334455'","sys_ver":"'1.2.3.4'","app_ver":"'4.5.6.7'","alias":"'name'","now":"1234567890","tz":"0","alarm_status":"0","ddns_status":"0","ddns_host":"''","oray_type":"0","upnp_status":"0","p2p_status":"0","p2p_local_port":"23411","msn_status":"0"}}

------------

####get_wifi_scan_result.php
Get wireless network camera search results . Run wifi_scan.php before running this.
#####syntax:
get_wifi_scan_result.php?user=admin&pwd=admin&ip=192.168.2.12
#####returns:
{"Data":{"ap_bssid":"new Array()","ap_ssid":"new Array()","ap_mode":"new Array()","ap_security":"new Array()","ap_bssid[0]":"'000000123456'","ap_ssid[0]":"'name'","ap_mode[0]":"0","ap_security[0]":"1","ap_number":"1"}}

------------

####wifi_scan.php
Starts the Wifi scan. See the scan results at get_wifi_scan_result.php
#####syntax:
wifi_scan.php?user=admin&pwd=admin&ip=192.168.2.12
#####linked class:
get_wifi_scan_result.php

------------

###[Setters]

####camera_control.php
Sets camera sensor Parameters. 
#####syntax:
camera_control.php?param=1&value=1&ip=192.168.2.12

param  | value
------------- | -------------
0 Resolution   | 2: 160x120 / 8: 320x240 / 32: 640x480 
1 Brightness   | 0~255 
2 Contrast|0~6 
3 mode |0: 50Hz / 1: 60Hz / 2: Outdoor
5 Flip&mirror | 0: default / 1: flip / 2: mirror / 3: flip + mirror 

#####linked class:
get_camera_params.php

-------------

####decoder_control.php
For all your the camera rotations.
#####syntax:
decoder_control.php?user=admin&pwd=admin&command=0&onestep=0&ip=192.168.2.12

onestep = 1：operation specified in a single step operation head to stop, only for the model comes with ptz functions and applies only up, down, left and right operation. 

command|result
------------- | -------------
0|up
1|Stop up
2|Down 
3|Stop down
4|Left
5|Stop left
6|Right
7|Stop right
8|Small aperture             
9|Stop small aperture      
10|Big aperture  
11|Stop big aperture        
12|The focal distance is near             
13|Stop near focal distance               
14|The focal distance is far
15|Stop far focal distance  
16|Zoom is near
17|Stop near zoom            
18|Zoom is far   
19|Stop far zoom               
20|Auto cruise    
21|Stop auto cruise           
22|Closed switch 1            
23|Disconnect switch 1     
24|Closed switch 2     

-------------

####reboot.php
Reboot the camera and clear log.php.
#####syntax:
reboot.php?user=admin&pwd=admin&ip=192.168.2.12

------------



####set_misc.php
Set the parameters of the camera Miscellaneous. Mostly used for setting the automatic patrol of a camera. You can also turn the lights on/off with led_mode.
#####syntax:
set_misc.php?led_mode=&0ptz_center_onstart=0&ptz_auto_patrol_interval=0&ptz_auto_patr
ol_type=0&ptz_patrol_h_rounds=0&ptz_patrol_v_rounds=0&user=admin&pwd=admin&ip=192.168.2.12

param  | value
------------- | -------------
led_mode:    | 0: Mode 1 / 1: Mode 2 / 2: Turn off lights 
ptz_center_onstart   | 0: camera doesn't patrol onstart / 1: camera patrols onstart 
ptz_auto_patrol_interval|0: No automatic inspection / l: automatic inspection interval
ptz_auto_patrol_type |0: None / 1: horizontal / 2: Vertical / 3: Horizontal + Vertical 
ptz_patrol_h_rounds | levels inspection laps / 0: infinity
ptz_patrol_v_rounds | vertical patrol laps / 0: infinity
