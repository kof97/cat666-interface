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
Get the videos by keywords. The name of the GET is "key".  
For example:
> http://cat666.com/cat666-interface/index.php/index/search

***if return 0, that means get nothing by GET, please check your input.***

# TEST
In the root path, execute phpunit tests.