# How to run API on the local environment

1. Download and install XAMPP for a local server (Apache) - [apachefriends](https://www.apachefriends.org/)

2. Copy project to htdocs (C:/...path-where-you-istalled.../XAMPP/htdocs);

3. Folder’s names will be the URL for localhost (EXAMPLE: folders path ‘/XAMPP/htdocs/rest-api/server/index.php’ will provide you a URL like ’http://localhost/rest-api/server/index.php');

4. Run XAMPP;

5. Start Apache server (https://prnt.sc/nkwf0fQGVl3G);

6. In the browser add the URL according to your project’s path - ’http://localhost/…project-folders…/index.php'. In my case it was ‘C:/XAMPP/htdocs/rest-api/server/’ -> ’http://localhost/rest-api/server/index.php';

#



# API usage
### `../index.php` 
### Method `GET`;

'http://localhost/rest-api/server/index.php' or 'http://localhost/rest-api/server/';

Endpoint to get a list of items from the ‘sdks.php’ file;
By default without any params returns an array with data of the first 10 items from the list (in JSON);


```
[
    {
        "title": "Item title",
        "id": "itemId",
        "tags": [
            "item-tag-1",
            "item-tag-2",
            ... 
        ]
    },
    ...
]
```

### Query params:

#

### `limit` 
type=number | default=10 | Not required  
>'../index.php?limit=5' 

Items count in result array per page;

#

### `page` 
type=number | default=1 | Not required  
>'../index.php?page=2' 

Page of items with the limit count. If there weren’t any items on added page it returns an empty array.

#

### `input` 
type=string | default=null | Not required  
>'../index.php?input=SomeTitle'   

Returns an array of elements whose lowercase titles include or equal to the lowercase input value.
Result array can be divided into pages and limits.

#

### `tags` 
type=string | default=null | Not required  
>'../index.php?tags=tag1'

or you can pass multi tags
>'../index.php?tags=tag1;tag2;tag3'

Returns an array of elements whose tag arrays contain at least one tag from the passed parameters.
Result array can be divided into pages and limits.

#

# EXAMPLE
>'../index.php?limit=5&input=SomeTitle&page=2&tags=tag1;tag2'

Return an array of 5 elements (`limit=5`), 

with indexes from 5 to 9 (for `page=1` - from 0 to 4), 

whose lowercase titles include or equal to the lowercase value "sometitle ” (`input=SomeTitle`) 

and whose tag arrays include the tag “tag1” or “tag2” (`tags=tag1;tag2`).

#

# OPTIONAL

> Consider this documentation might be read by another
developer planning to use your API endpoint in his product(s). How would you improve/change the documentation in that context? Please explain in your own words what is a good API documentation.

For me, good API documentation includes a short description of its functionality and code examples of requests/results. A list of options/params also is required, where each point describes how to pass them to the endpoint, in what form, and how it affects the result, with small code examples as well.

Maybe some code playground with API imitation is a good way to improve documentation.


