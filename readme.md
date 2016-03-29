# cat666 interface introduce
-----
First, we have only one controller that is the index. Each methods can be find in the index controller.

## Request Mode
> $base_url/cat666-interface/index.php/index/$method

$base_url is the base url, $method is the method name.   
For example:
> http://cat666.com/cat666-interface/index.php/index/getRecommend

## getRecommend
Get the recommend videos, including the four hits highest videos and the four hits highest videos in every categorys.  
For example:
> http://cat666.com/cat666-interface/index.php/index/getRecommend

## getCat/$id
Get videos by category id  
For example:
> http://cat666.com/cat666-interface/index.php/index/getCat/1

## search
Get the videos by keywords. The name of the POST is "key".  
For example:
> http://cat666.com/cat666-interface/index.php/index/search

***if return [{"error": "0"}], that means get nothing by GET, please check your input.***

## getDanmu
Get the Danmu by video id. The name of the POST is "id".  
For example:
> http://cat666.com/cat666-interface/index.php/index/getDanmu  
  
## getCatRecommend
Get the categroies' recommend videos that order by viewcounts limit 0, 8. If the number of the videos is less than 8, then return all videos that ordered by viewcounts limit 0, 8. The name of the POST is "id".  
For example:
> http://cat666.com/cat666-interface/index.php/index/getCatRecommend  

## viewcounts
Make the viewcounts add one as while as you have already seen the video. The name of the POST is "id".    
For example:
> http://cat666.com/cat666-interface/index.php/index/viewcounts  

## register
user register. The name of the POST is "user" and "password".  
If return "error : 0", that means user is null, please check you input.  
If return "res : 0", that means user has already existed.  
If return id and username, it means register successful.  
For example:
> http://cat666.com/cat666-interface/index.php/index/register

## check
Login. Check the user info. The name of the POST is "user" and "password".   
If return "error : 0", that means username or password is not right.  
For example:
> http://cat666.com/cat666-interface/index.php/index/check

## getCollection  
Get the collection by userId. The name of the POST is "userid".   
> http://cat666.com/cat666-interface/index.php/index/getCollection    

## setCollection  
Add the user's collection. The name of the POST is "userid" and "videoid".  
If return "error : 0", please check your post.   
If return "exist : 1", that means user has already collected the video.   
If return "failed : 1", that means collecting failed.    
If return "succeed : 1", that means collecting succeed.  
> http://cat666.com/cat666-interface/index.php/index/setCollection      

## cancelCollection  
Cancel the user's collection. The name of the POST is "userid" and "videoid".  
If return "error : 0", please check your post.   
If return "already cancel : 1", that means user has already canceled the collection.   
If return "failed : 1", that means cancel failed.    
If return "succeed : 1", that means cancel succeed. 
> http://cat666.com/cat666-interface/index.php/index/cancelCollection      
  
## getVideoInfo  
Get video infomation including video and user. The name of the POST is "videoid". 
If return "error : 0", please check your post.   
> http://cat666.com/cat666-interface/index.php/index/getVideoInfo  

## alterNick  
Change the user's nick name. The name of the POST is "userid" and "nick".  
If return "error : 0", please check your post.    
If return "failed : 1", that means changed failed.    
If return "succeed : 1", that means changed succeed. 
> http://cat666.com/cat666-interface/index.php/index/alterNick  

## alterSex  
Change the user's sex. The name of the POST is "userid" and "sex".  
The `sex` accept 0 (man) or 1 (woman); 
If return "error : 0", please check your post.    
If return "failed : 1", that means changed failed.    
If return "succeed : 1", that means changed succeed. 
> http://cat666.com/cat666-interface/index.php/index/alterSex      

## alterBirth  
Change the user's birth. The name of the POST is "userid" and "birth".  
The `birth` accept that such as `2015/01/01`; 
If return "error : 0", please check your post.    
If return "failed : 1", that means changed failed.    
If return "succeed : 1", that means changed succeed. 
> http://cat666.com/cat666-interface/index.php/index/alterBirth    

## alterSignature  
Change the user's signature. The name of the POST is "userid" and "signature".  
If return "error : 0", please check your post.    
If return "failed : 1", that means changed failed.    
If return "succeed : 1", that means changed succeed. 
> http://cat666.com/cat666-interface/index.php/index/alterSignature    

## alterPassword  
Change the user's password. The name of the POST is "userid" and "password".  
If return "error : 0", please check your post.    
If return "failed : 1", that means changed failed.    
If return "succeed : 1", that means changed succeed. 
> http://cat666.com/cat666-interface/index.php/index/alterPassword   

## sendDanmu  
Change the user's password. The name of the POST is "userid", "videoid" and "danmu".  
The `danmu` accept that such as   
`{ "text":"梦有形，心相伴！","color":"#f01f5a","size":"1","position":"0","time":3}`;  
If return "error : 0", please check your post.    
If return "failed : 1", that means changed failed.    
If return "succeed : 1", that means changed succeed. 
> http://cat666.com/cat666-interface/index.php/index/sendDanmu   



# TEST
In the root path, execute phpunit tests.