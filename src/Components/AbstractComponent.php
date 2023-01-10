<?php 
namespace OSW3\UrlParserPhp\Components;

use OSW3\UrlParserPhp\Helper;

abstract class AbstractComponent
{
    protected string|null $url = null;

    /**
     * Algorithm of the Hash
     *
     * @var string
     */
    private array $algo = array("md5");

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function info(): string|array|null
    {
        $arguments  = func_get_args();
        $info       = $this->parser();

        if (empty($arguments))
        {
            return $info;
        }

        $key = $arguments[0];

        if (isset($info[$key]))
        {
            return $info[$key];
        }

        return null;
    }

    protected function standardParser(string $subject, array $additional = array())
    {
        $standard               = Helper::DEFAULT_RESPONSE;

        $standard['subject']    = $subject;
        $standard['hash']       = $this->hash($subject);
        $standard['length']     = strlen($subject);
        $standard['positions']  = $this->positions($this->url, $subject);

        return array_merge($standard, $additional);
    }

    protected function hash(string $subject): array
    {
        $hash = [];

        if (empty(trim($subject))) return $hash;

        foreach ($this->algo as $algorithm)
        {
            if (in_array($algorithm, hash_algos()))
            {
                $hash[$algorithm] = hash($algorithm, $subject);
            }
        }

        return $hash;
    }

    protected function positions(string $url, string $subject, int $offsetStart = 0, int $offsetEnd = 0): array
    {
        $length = strlen($subject);
        $start  = strpos($url, $subject);
        $end    = $start + $length;

        return array(
            'start' => ($start + $offsetStart),
            'end' => ($end + $offsetEnd),
        );
    }    

    protected function parseParameters(string $subject): array
    {
        parse_str($subject, $parameters);

        // $parameters = explode(Helper::QUERY_SEPARATOR, $subject);

        // foreach ($parameters as $key => $param)
        // {
        //     $param = explode("=", $param);
        //     $name = $param[0];
        //     $value = $param[1];

        //     $parameters[$key] = array(
        //         'name'  => $name,
        //         'value' => $value,
        //     );
        // }

        return $parameters;
    }

    protected function queryDelimiters(string $url, string $delimiter)
    {
        $d1 = strpos($url, Helper::QUERY_IDENTIFIER);
        $d2 = strpos($url, Helper::FRAGMENT_IDENTIFIER);

        switch ($delimiter)
        {
            case Helper::QUERY_IDENTIFIER:
                $start = $d1;
                $end = $d2 - $start;
            break;

            case Helper::FRAGMENT_IDENTIFIER:
                $start = $d2;
                $end = $d1 - $start;
            break;
        }

        if ($start === false) {
            $start = 0;
            $end = 0;
        }

        if ($end < $start) {
            $end = strlen($url);
        }

        return[
            'start' => $start,
            'end' => $end,
        ];
    }
}