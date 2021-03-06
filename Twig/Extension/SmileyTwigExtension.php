<?php

namespace Yosimitso\WorkingForumBundle\Twig\Extension;


class SmileyTwigExtension extends \Twig_Extension
{
    
    private $basePath;
    private $listSmiley;
    public function __construct(\Symfony\Component\HttpFoundation\RequestStack $request_stack) {
        $request = $request_stack->getCurrentRequest();
        if (is_object($request))
        {
        $this->basePath = $request->getBasePath();
        }
        else {
            $this->basePath = '';
        }
        
        $this->listSmiley = [
            ':smile:' => 'smile.png',
            ':wink:' => 'wink.png',
            ':angry:' => 'angry.png',
            ':bigsmile:' => 'big_grin.png',
            ':crying:' => 'crying.png',
            ':sad:' => 'frown.png',
            ':tongue:' => 'tongue.png',
            ':zzz:' => 'yawn.png',
            ':zipped:' => 'zipped.png',
            ':sick:' => 'sick.png',
            ':whistle:' => 'whistle.png',
            ':evil:' => 'evil.png',
            ':stress:' => 'stress.png',
            ':delicious:' => 'delicious.png',
            ':shy:' => 'bashful.png',
            ':bored:' => 'bored.png',
            ':confused:' => 'confused.png',
            ':heart:' => 'heart.png',
            ':love:' => 'love.png',
            ':oh:' => 'oh.png',
            ':nerdy:' => 'nerdy.png',
            ':present:' => 'present.png',
            ':sun:' => 'sun.png',
            ':sunglasses:' => 'sunglasses.png',
            ':xd:' => 'xd.png',
            ':football:' => 'football.png',
            ':tennis:' => 'tennis.png',
            ':basketball:' => 'basketball.png',
            ':thumbup:' => 'thumbup.png',
            ':thumbdown:' => 'thumbdown.png'
           
         
            
        ];
    
    }
    public function getListSmiley()
    {
        return $this->listSmiley;
    }
      public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('smiley', array($this, 'smiley'))
        );
    }

    public function smiley($text)
    {
       
            

     
        foreach ($this->listSmiley as $key => $value)
        {
            $list[$key] = '<img src="'.$this->basePath.'/bundles/yosimitsoworkingforum/images/smiley/'.$value.'" />';
        }
        return $this->strReplaceAssoc($list, $text);
    }
    public function getName()
    {
        return 'smiley';
    }
    
    function strReplaceAssoc(array $replace, $subject) {
   return str_replace(array_keys($replace), array_values($replace), $subject);   
    } 
}