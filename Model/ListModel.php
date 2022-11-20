<?php

class ListModel
{
    protected $data = null;

    public function __construct()
    {
        $arr = include PROJECT_ROOT_PATH . 'sdks.php';
        $arr = Helpers::unique_multidim_array($arr, 'id');
        $arr = Helpers::unique_multidim_array($arr, 'title');
        $arr = Helpers::isseted_child_array($arr, 'tags');
        $arr = Helpers::sort_by_key($arr, 'title');
        
        $this->data = $arr;
    }

    protected function filterByTitle(array $array, string $str): array 
    {

        function is_str_contains(string $haystack, string $needle): bool
        {
            return '' === $needle || false !== strpos($haystack, $needle);
        }

        $res = array_filter($array, function($item) use($str) {
            return is_str_contains(strtolower($item['title']), strtolower($str));
        });

        return $res;
    }

    protected function filterByTags(array $array, array $tags): array 
    {
        $res = [];

        foreach ($array as $val) {
            $c = array_intersect($val['tags'], $tags);

            if (count($c) > 0) {
                $res[] = $val;
            }
        }

        return $res;
    }

    public function getItems(array $options): array
    {
        [
            'page' => $page,
            'limit' =>  $limit,
            'input' =>  $input,
            'tags' =>  $tags
        ] = $options;
        $res = $this->data;
        
        if($input) {
            $res = $this->filterByTitle($res, $input);
        }

        if($tags) {
            $res = $this->filterByTags($res, $tags);
        }

        $res = array_slice($res, ($page - 1) * $limit , $limit); 
        return $res;
    }

}