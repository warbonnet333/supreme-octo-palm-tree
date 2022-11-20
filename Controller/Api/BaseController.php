<?php
class BaseController
{
    /**
     * Get querystring params.
     * 
     * @return array
     */
    protected function getQueryStringParams()
    {
        parse_str($_SERVER['QUERY_STRING'], $query);
        return $query;
    }
    
    /**
     * Get params array [page, limit, input, tags].
     * 
     * @param array $queryString
     * 
     * @return array
     */
    protected function getParamsArray($queryString)
    {
        $res = [
            'page' => 1,
            'limit' => 10,
            'input' => null,
            'tags' => null,
        ];
       
        if (isset($queryString['page']) && $queryString['page']) {
            $res['page'] = (int) $queryString['page'];
        }

        if (isset($queryString['limit']) && $queryString['limit']) {
            $res['limit'] = (int) $queryString['limit'];
        }

        if (isset($queryString['input']) && $queryString['input']) {
            $res['input'] = $queryString['input'];
        }

        if (isset($queryString['tags']) && $queryString['tags']) {
            $intTags = $queryString['tags'];
            $res['tags'] = explode(';', $intTags);
        }

        return $res;
    }
 
    /**
     * Send API output.
     *
     * @param mixed  $data
     * @param string $httpHeader
     */
    protected function sendOutput($data, $httpHeaders=array())
    {
        header_remove('Set-Cookie');
 
        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }
 
        echo $data;
        exit;
    }
}