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
> http://cat666.com/cat666-interface/index.php/index/setCollection      


# TEST
In the root path, execute phpunit tests.