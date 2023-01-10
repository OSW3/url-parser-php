<?php
namespace OSW3\UrlParserPhp\Components;

use OSW3\UrlParserPhp\Helper;
use OSW3\UrlParserPhp\Components\Query;
use OSW3\UrlParserPhp\Components\Fragment;
use OSW3\UrlParserPhp\Components\Protocol;
use OSW3\UrlParserPhp\Components\AbstractComponent;

class Path extends AbstractComponent
{
    protected function parser(): array
    {
        $response = array_merge(Helper::DEFAULT_RESPONSE, [
            'elements' => array(),
            'file' => array(),
        ]);

        $subject = str_replace("&amp;", Helper::QUERY_SEPARATOR, $this->url);
        $subject = str_replace($this->getProtocol(), "", $subject);
        $subject = str_replace($this->getFragment(), "", $subject);
        $subject = str_replace($this->getQuery(), "", $subject);

        if ($pos = strpos($subject, "/"))
        {
            $subject = substr($subject, $pos);
            $elements = explode("/", substr($subject, 1));

            if (empty(end($elements)))
            {
                $elements = array_splice($elements, 0, -1);
            }

            $fileinfo = array();
            $filename = end($elements);
            if ($extension = strpos($filename, "."))
            {
                $file = substr($filename, 0, $extension);
                $extension = substr($filename, $extension + 1);
                // $elements = array_splice($elements, 0, -1);

                if (preg_match("/^[a-z0-9]+$/i", $extension))
                {
                    $fileinfo['filename'] = $this->standardParser($filename);
                    unset($fileinfo['filename']['positions']);
    
                    $fileinfo['file'] = $this->standardParser($file);
                    unset($fileinfo['file']['positions']);
    
                    $fileinfo['extension'] = $this->standardParser($extension);
                    unset($fileinfo['extension']['positions']);
                }
            }

            foreach ($elements as $key => $element)
            {
                $elements[$key] = $this->standardParser($element);
            }

            $response = $this->standardParser($subject, [
                'elements' => $elements,
                'file' => $fileinfo,
            ]);
        }

        return $response;
    }

    private function getProtocol(): ?string
    {
        return (new Protocol($this->url))->info('subject');
    }

    private function getFragment(): ?string
    {
        return (new Fragment($this->url))->info('subject');
    }

    private function getQuery(): ?string
    {
        return (new Query($this->url))->info('subject');
    }
}