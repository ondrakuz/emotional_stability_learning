<?php
class VideosController extends Controller
{
    public function ctrMain($parameters)
    {
        global $expressions, $lang;
        
        if (sha1($_POST['login_passw']) == '7d463a073948c97f11f40fdcdd7af532239f29a9') {
            $this->headr['title'] = $expressions['Interpretation videos'];
            $this->headr['key_words'] = $expressions['Interpretation videos'];
            $this->headr['description'] = $expressions['Interpretation videos'];
            
            $this->data['expressions'] = $expressions;
            $this->data['lang'] = $lang;
            
            $this->view = 'videos';
        } else {
            $this->data['text'] = $expressions['Login error: wrong password'];
            
            $this->headr['title'] = $expressions['Error'];
            $this->headr['key_words'] = $expressions['Error'];
            $this->headr['description'] = $expressions['Error page'];

            $this->view = 'error';
        }
    }
}
