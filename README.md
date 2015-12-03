## IPcamera-API
php files to send and receive IP camera data

-------------

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

-------------

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

#Todo:

####get_camera_params.php
####get_forbidden.php
####get_log.php
####get_misc.php
####get_params.php
####get_status.php
####get_wifi_scan_result.php
####reboot.php
####set_misc.php
####wifi_scan.php
