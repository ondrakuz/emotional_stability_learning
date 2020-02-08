<?php
class VideosLoginController extends Controller
{
    public function ctrMain($parameters)
    {
        global $expressions, $lang;
        
        $this->headr['title'] = $expressions['Videos login'];
        $this->headr['key_words'] = "$expressions[Login], $expressions[Videos]";
        $this->headr['description'] = $expressions['Videos login'];
        
        $this->data['expressions'] = $expressions;
        $this->data['lang'] = $lang;
        
        $this->view = 'videosLogin';
    }
}
