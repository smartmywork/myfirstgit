<?php


class SettingsController extends AppController{

	public $uses = array('Settings','PageContent');

	function isAuthorized() {
        if(parent::isAuthorized()){
            return true;
        }else{
            $this->Session->setFlash(__('You are not authorized to access this page'));
            $this->redirect('/');
        }
    }

    function admin_index(){
    	$res = $this->Settings->find('all');
    	//debug($res); exit(0);
    	$this->set('settings',$res);
        $this->_setActiveNavigation();        
    }

    function admin_edit($id = null){
    	if(!$this->Settings->exists($id)){
    		$this->Session->setFlash(__('Record not found'));
    		$this->redirect(array('controller'=>'settings','action'=>'index','admin'=>true));
    	}
    	if($this->request->is('post') || $this->request->is('put')){ //debug($this->request->data);
                if (is_uploaded_file(@$this->request->data['img_file']['tmp_name']))  { 
                    $ext = pathinfo($this->request->data['img_file']['name'], PATHINFO_EXTENSION); 
                    $filename = time().'_'.pathinfo($this->request->data['img_file']['name'], PATHINFO_FILENAME).'.'.$ext;
                    if(move_uploaded_file($this->request->data['img_file']['tmp_name'], APP.WEBROOT_DIR.DS.'img'.DS.$filename)){
                        $this->request->data['Settings']['value'] =  $filename;
                    }
                    unset($this->request->data['img_file']);
                }
    		if($this->Settings->save($this->request->data)){
    			$this->Session->setFlash(__('Changes have been saved'),'flashgood');
    			$this->redirect(array('controller'=>'settings','action'=>'index','admin'=>true));
    		}else{
    			$this->Session->setFlash(__('Changes not saved'));
    		}
    	}
    	$this->request->data = $this->Settings->find('first',array('conditions'=>array('Settings.id'=>$id)));
        $this->_setActiveNavigation();   
    }

    function admin_pages($id = null){
        $this->_setActiveNavigation('pages');   
        if(!$this->Page->exists($id)){
            $this->redirect(array('controller'=>'errors','action'=>'error404','admin'=>true));
        }

        if($this->request->is('put') || $this->request->is('post')){
            $_page['Page'] = $this->request->data['Page'];
            $_content['PageContent'] = $this->request->data['PageContent'];

            $this->Page->set($this->request->data);
            if(!$this->Page->validates($this->request->data,array('name','slug'))){
                return false;
            }
            
            if(empty($_content['PageContent']['id'])){
                unset($_content['PageContent']['id']);
                $_content['PageContent']['page_id'] =  $_page['Page']['id'];
            }
            /*debug($_page);
            debug($_content); exit(0);*/
            if($this->Page->save($_page) && $this->PageContent->save($_content)){
                $this->Session->setFlash(__('Page '.$_page['Page']['name'].' refresh.'), 'flashgood');
                $this->redirect(array('controller'=>'settings', 'action' => 'pages','admin'=>true,$_page['Page']['id']));
            }else{
                $this->Session->setFlash(__('Failed to refresh the page try again.'));
            }
        }else{
            $this->request->data = $this->Page->find('first',array('conditions'=>array('Page.id'=>$id)));
        }
    }    

    function admin_blocks($id = null){
        $this->_setActiveNavigation('blocks');   
        if(!$this->Block->exists($id)){
            $this->redirect(array('controller'=>'errors','action'=>'error404','admin'=>true));
        }

        if($this->request->is('put') || $this->request->is('post')){
            if($this->Block->save($this->request->data)){
                $this->Session->setFlash(__('Block '.$this->request->data['Block']['title'].' refresh.'), 'flashgood');
                $this->redirect(array('controller'=>'settings', 'action' => 'blocks','admin'=>true,$this->request->data['Block']['id']));
            }else{
                $this->Session->setFlash(__('Failed to refresh the block try again.'));
            }
        }else{
            $this->request->data = $this->Block->find('first',array('conditions'=>array('Block.id'=>$id)));
        }

        $listBlock = $this->Block->find('list',array('id','title'));
        $this->set('listBlock',$listBlock);
    }

    function admin_courses(){
        $this->_setActiveNavigation('blocks');   
        $this->set('title_for_layout','Courses');
        $this->paginate = array(
                'Course'=>array(
                    'order' => array('Course.id' => 'desc'),
                    'limit'=>10
                    )
                );
        $this->set('courses',$this->paginate('Course'));
    }

    function admin_courses_add(){
        $this->_setActiveNavigation('blocks');   
        if($this->request->is('post') || $this->request->is('put')){
            $_course['Course'] = $this->request->data['Course'];
            if($this->Course->save($_course)){
                $image = $this->_uploadFile('courses');
                if($image){
                    $this->Course->set('image',$image);
                    $this->Course->save();
                } 
                $this->Session->setFlash(__('The new course is added'),'flashgood');
                $this->redirect(array('controller'=>'settings','action'=>'courses','admin'=>true));
            }else{
                $this->Session->setFlash(__('The course is not added'));
            }
            //debug($this->request->data); exit(0);
        }
    }

    function admin_courses_edit($id = null){
        $this->_setActiveNavigation('blocks');   
        if(!$this->Course->exists($id)){
            $this->Session->setFlash(__('Course not found'));
            $this->redirect(array('controller'=>'settings','action'=>'courses','admin'=>true));
        }

        if($this->request->is('post') || $this->request->is('put')){
            $_course['Course'] = $this->request->data['Course'];
            if($this->Course->save($_course)){
                $image = $this->_uploadFile();
                if($image){
                    $this->Course->set('image',$image);
                    $this->Course->save('courses');
                }                
                $this->Session->setFlash(__('The new course is added'),'flashgood');
                $this->redirect(array('controller'=>'settings','action'=>'courses','admin'=>true));
            }else{
                $this->Session->setFlash(__('The course is not added'));
            }            
        }else{
            $res = $this->request->data = $this->Course->findById($id);
        }
    }

    function admin_courses_delete($id = null){
        if(!$this->Course->exists($id)){
            $this->Session->setFlash(__('Course not found'));
            $this->redirect(array('controller'=>'settings','action'=>'courses','admin'=>true));
        }
        $image = $this->Course->find('first',array('conditions'=>array('Course.id'=>$id),'fields'=>array('image')));
        //debug($image); exit(0);
        if($this->Course->delete($id)){
            if(file_exists(APP.WEBROOT_DIR.'/img/courses/'.$image['Course']['image'])){ // remove image
                unlink(APP.WEBROOT_DIR.'/img/courses/'.$image['Course']['image']);
            }
            $this->Session->setFlash(__('The course is removed'),'flashgood');
        }else{
            $this->Session->setFlash(__('The course is not removed'));
        }
        $this->redirect(array('controller'=>'settings','action'=>'courses','admin'=>true));
    }

    function admin_experts(){
        $this->_setActiveNavigation('blocks');   
        $this->set('title_for_layout','Expert');
        $this->paginate = array(
                'Expert'=>array(
                    'order' => array('Expert.id' => 'desc'),
                    'limit'=>10
                    )
                );
        $this->set('experts',$this->paginate('Expert'));
    }  

    public function admin_expert_add() {
        $this->_setActiveNavigation('blocks');   
        if($this->request->is('post') || $this->request->is('put')){ //debug($this->request->data);
            $_expert['Expert'] = $this->request->data['Expert']; //debug($_expert); exit(0);
            if($this->Expert->save($_expert)){
                $image = $this->_uploadFile('experts');
                if($image){
                    $this->Expert->set('image',$image);
                    $this->Expert->save();
                } 
                $this->Session->setFlash(__('The new expert is added'),'flashgood');
                $this->redirect(array('controller'=>'settings','action'=>'experts','admin'=>true));
            }else{
                $this->Session->setFlash(__('The expert is not added'));
            }
            //debug($this->request->data); exit(0);
        }
    }

    public function admin_expert_edit($id = null) {
        $this->_setActiveNavigation('blocks');   
        if(!$this->Expert->exists($id)){
            $this->Session->setFlash(__('Expert not found'));
            $this->redirect(array('controller'=>'settings','action'=>'experts','admin'=>true));
        }

        if($this->request->is('post') || $this->request->is('put')){
            $_expert['Expert'] = $this->request->data['Expert'];
            if($this->Expert->save($_expert)){
                $image = $this->_uploadFile('experts');
                if($image){
                    $this->Expert->set('image',$image);
                    $this->Expert->save();
                }                
                $this->Session->setFlash(__('The new expert is added'),'flashgood');
                $this->redirect(array('controller'=>'settings','action'=>'experts','admin'=>true));
            }else{
                $this->Session->setFlash(__('The expert is not added'));
            }            
        }else{
            $res = $this->request->data = $this->Expert->findById($id);
        }
    }

    function admin_expert_delete($id = null){
        if(!$this->Expert->exists($id)){
            $this->Session->setFlash(__('Expert not found'));
            $this->redirect(array('controller'=>'settings','action'=>'experts','admin'=>true));
        }
        $image = $this->Expert->find('first',array('conditions'=>array('Expert.id'=>$id),'fields'=>array('image')));
        //debug($image); exit(0);
        if($this->Expert->delete($id)){
            if(file_exists(APP.WEBROOT_DIR.'/img/experts/'.$image['Expert']['image'])){ // remove image
                unlink(APP.WEBROOT_DIR.'/img/experts/'.$image['Expert']['image']);
            }
            $this->Session->setFlash(__('The record is removed'),'flashgood');
        }else{
            $this->Session->setFlash(__('The record is not removed'));
        }
        $this->redirect(array('controller'=>'settings','action'=>'experts','admin'=>true));
    }

    function admin_testimonials(){
        $this->_setActiveNavigation('blocks');   
        $this->set('title_for_layout','Testimonials');
        $this->paginate = array(
                'Testimonial'=>array(
                    'order' => array('Testimonial.id' => 'desc'),
                                        'limit'=>10
                                        )
                );
        $this->set('testimonials',$this->paginate('Testimonial'));
    }  

    public function admin_testimonial_add() {
        $this->_setActiveNavigation('blocks');   
        if($this->request->is('post') || $this->request->is('put')){ 
            $_testimonial['Testimonial'] = $this->request->data['Testimonial'];
            if($this->Testimonial->save($_testimonial)){
                $image = $this->_upload('testimonials');
                if($image){
                    $this->Testimonial->set('image',$image);
                    $this->Testimonial->save();
                } 
                $this->Session->setFlash(__('The new record is added'),'flashgood');
                $this->redirect(array('controller'=>'settings','action'=>'testimonials','admin'=>true));
            }else{
                $this->Session->setFlash(__('The record is not added'));
            }
            //debug($this->request->data); exit(0);
        }
    }

    public function admin_testimonial_edit($id = null) {
        $this->_setActiveNavigation('blocks');   
        if(!$this->Testimonial->exists($id)){
            $this->Session->setFlash(__('Testimonial not found'));
            $this->redirect(array('controller'=>'settings','action'=>'testimonials','admin'=>true));
        }

        if($this->request->is('post') || $this->request->is('put')){
            $_testimonial['Testimonial'] = $this->request->data['Testimonial'];
            if($this->Testimonial->save($_testimonial)){
                $image = $this->_upload('testimonials');
                if($image){
                    $this->Testimonial->set('image',$image);
                    $this->Testimonial->save();
                }             
                $this->Session->setFlash(__('The new record is added'),'flashgood');
                $this->redirect(array('controller'=>'settings','action'=>'testimonials','admin'=>true));
            }else{
                $this->Session->setFlash(__('The record is not added'));
            }            
        }else{
            $res = $this->request->data = $this->Testimonial->findById($id);
        }
    }

    function admin_testimonial_delete($id = null){
        if(!$this->Testimonial->exists($id)){
            $this->Session->setFlash(__('Record not found'));
            $this->redirect(array('controller'=>'settings','action'=>'testimonials','admin'=>true));
        }
        $image = $this->Testimonial->find('first',array('conditions'=>array('Testimonial.id'=>$id),'fields'=>array('image')));
        //debug($image); exit(0);
        if($this->Testimonial->delete($id)){
            if(file_exists(APP.WEBROOT_DIR.'/img/testimonials/'.$image['Testimonial']['image'])){ // remove image
                unlink(APP.WEBROOT_DIR.'/img/testimonials/'.$image['Testimonial']['image']);
            }
            $this->Session->setFlash(__('The record is removed'),'flashgood');
        }else{
            $this->Session->setFlash(__('The record is not removed'));
        }
        $this->redirect(array('controller'=>'settings','action'=>'testimonials','admin'=>true));
    }

    function admin_sliders(){
        $this->_setActiveNavigation('blocks');   
        $this->set('title_for_layout','Sliders');
        $this->paginate = array(
                'Slider'=>array(
                    'order' => array('Slider.id' => 'desc'),
                                        'limit'=>10
                                        )
                );
        $this->set('sliders',$this->paginate('Slider'));
    }  

    public function admin_slider_add() {
        $this->_setActiveNavigation('blocks');   
        if($this->request->is('post') || $this->request->is('put')){
            //debug($this->request->data); exit(0);
            $_slider['Slider'] = $this->request->data['Slider'];
            if($this->Slider->save($_slider)){
                $images = $this->_uploadImageForSlider();
                    $this->Slider->set('image1',$images['image1']);
                    $this->Slider->set('image2',$images['image2']);
                    $this->Slider->save();
                $this->Session->setFlash(__('The new slider is added'),'flashgood');
                $this->redirect(array('controller'=>'settings','action'=>'sliders','admin'=>true));
            }else{
                $this->Session->setFlash(__('The slider is not added'));
            }
        }
    }

    public function admin_slider_edit($id = null) {
        $this->_setActiveNavigation('blocks');   
        if(!$this->Slider->exists($id)){
            $this->Session->setFlash(__('Slider not found'));
            $this->redirect(array('controller'=>'settings','action'=>'sliders','admin'=>true));
        }
        if($this->request->is('post') || $this->request->is('put')){
            $_slider['Slider'] = $this->request->data['Slider'];
            $_oldImages = $this->Slider->find('first',array('fields'=>array('Slider.image1','Slider.image2'),'conditions'=>array('Slider.id'=>$id)));
            if($this->Slider->save($_slider)){
                $images = $this->_uploadImageForSlider();
                    if($images['image1']){ $this->_deleteImage('sliders',$_oldImages['Slider']['image1']); $this->Slider->set('image1',$images['image1']); $this->Slider->save();}
                    if($images['image2']){ $this->_deleteImage('sliders',$_oldImages['Slider']['image2']); $this->Slider->set('image2',$images['image2']); $this->Slider->save();}                    
                $this->Session->setFlash(__('Changes has been saved'),'flashgood');
                $this->redirect(array('controller'=>'settings','action'=>'sliders','admin'=>true));
            }else{
                $this->Session->setFlash(__('Changes are not saved, try again'));
            }            
        }
        $res = $this->request->data = $this->Slider->findById($id);
    }

    public function admin_slider_delete($id = null){
        if(!$this->Slider->exists($id)){
            $this->Session->setFlash(__('Slider not found'));
            $this->redirect(array('controller'=>'settings','action'=>'sliders','admin'=>true));
        }
        $_oldImages = $this->Slider->find('first',array('conditions'=>array('Slider.id'=>$id),'fields'=>array('image1','image2')));
        //debug($image); exit(0);
        if($this->Slider->delete($id)){
            $this->_deleteImage('sliders',$_oldImages['Slider']['image1']);
            $this->_deleteImage('sliders',$_oldImages['Slider']['image2']);
            $this->Session->setFlash(__('The slider is removed'),'flashgood');
        }else{
            $this->Session->setFlash(__('The slider is not removed'));
        }
        $this->redirect(array('controller'=>'settings','action'=>'sliders','admin'=>true));
    }

    public function admin_slider_delete_image($id = null){
        if(!$this->Slider->exists($id)){
            $this->Session->setFlash(__('Slider not found'));
            $this->redirect(array('controller'=>'settings','action'=>'sliders','admin'=>true));
        }
        $_oldImages = $this->Slider->find('first',array('conditions'=>array('Slider.id'=>$id),'fields'=>array('image1','image2')));
        if(!empty($this->request->query) && !empty($_oldImages['Slider'][$this->request->query['image']])){
            $this->_deleteImage('sliders',$_oldImages['Slider'][$this->request->query['image']]);
            $this->Slider->set('id',$id);
            $this->Slider->set($this->request->query['image'],null);
            $this->Slider->save();
        }
        $this->redirect(array('controller'=>'settings','action'=>'slider_edit','admin'=>true,$id));
        exit(0);
    }

    private function _deleteImage($dir,$nameImage){
        if(file_exists(APP.WEBROOT_DIR.DS.'img'.DS.$dir.DS.$nameImage) && !empty($nameImage)){ // remove image
            unlink(APP.WEBROOT_DIR.DS.'img'.DS.$dir.DS.$nameImage);
        }
    }

    private function _uploadImageForSlider($dir = 'sliders'){
            $images = array('image1'=>null,'image2'=>null);
                if (is_uploaded_file($this->request->data['img_file1']['tmp_name']))  { 
                    $ext = pathinfo($this->request->data['img_file1']['name'], PATHINFO_EXTENSION); 
                    $filename = time().'_'.pathinfo($this->request->data['img_file1']['name'], PATHINFO_FILENAME).'.'.$ext;
                    if(move_uploaded_file($this->request->data['img_file1']['tmp_name'], APP.WEBROOT_DIR.'/img/'.$dir.'/'.$filename)){
                        $images['image1'] = $filename;
                    }
                }
                if (is_uploaded_file($this->request->data['img_file2']['tmp_name']))  { 
                    $ext = pathinfo($this->request->data['img_file2']['name'], PATHINFO_EXTENSION); 
                    $filename = time().'_'.pathinfo($this->request->data['img_file2']['name'], PATHINFO_FILENAME).'.'.$ext;
                    if(move_uploaded_file($this->request->data['img_file2']['tmp_name'], APP.WEBROOT_DIR.'/img/'.$dir.'/'.$filename)){
                        $images['image2'] = $filename;
                    }
                }
            return $images;
    }

    private function _upload($dir = null){ // loading images without changing the size
                if (is_uploaded_file($this->request->data['img_file']['tmp_name']))  { 
                    $ext = pathinfo($this->request->data['img_file']['name'], PATHINFO_EXTENSION); 
                    $filename = time().'_'.pathinfo($this->request->data['img_file']['name'], PATHINFO_FILENAME).'.'.$ext;
                    if(move_uploaded_file($this->request->data['img_file']['tmp_name'], APP.WEBROOT_DIR.'/img/'.$dir.'/'.$filename)){
                        return $filename;
                    }
                }
            return false;
    }
    
    private function _uploadFile($dir = ''){ 
        //debug($this->request->data); //exit(0);
        if (is_uploaded_file($this->request->data['img_file']['tmp_name']))  { 
                $ext = pathinfo($this->request->data['img_file']['name'], PATHINFO_EXTENSION); 
                //$path_from = pathinfo($this->request->data['img_file']['tmp_name'], PATHINFO_DIRNAME); 
                $path_from = $this->request->data['img_file']['tmp_name'];

                $filename = time().'_'.pathinfo($this->request->data['img_file']['name'], PATHINFO_FILENAME).'.'.$ext;
                //exit(0);
                //move_uploaded_file($this->request->data['img_file']['tmp_name'], APP.WEBROOT_DIR.'/files/images/'.$filename);
                //$this->request->data['img_file']['img'] = $filename;
                $path_to = APP.WEBROOT_DIR.'/img/'.$dir.'/';        
                $new_w = 420;
                $new_h = 420;
                $this->_resizePhoto($filename,$path_from,$path_to,$new_w,$new_h);
                //exit(0);
                return $filename;
            }
        return '';
    }

    private function _resizePhoto($file,$path_from,$path_to,$new_w,$new_h){
        //$source = $path_from.$file; //наш исходник

        $source = $path_from;
        // Проверяем, существует ли файл: если существует - ресайзим его
        if(file_exists($source))
        {
            $preview_dir = $path_to.$file; // путь для сохранения превьюшки 

            $height = $new_w; //параметр высоты превью
            $width = $new_h; //параметр ширины превью
            $rgb = 0xffffff; //цвет заливки несоответствия 0xFFFFFF - белый
            $size = getimagesize($source);//узнаем размеры картинки (дает нам масcив size)
            //определяем тип файла
            $format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1));
            $icfunc = "imagecreatefrom" . $format;   //определение функции соответственно типу файла

            //если нет такой функции прекращаем работу скрипта
            if (!function_exists($icfunc)) return false; 
            $x_ratio = $width / $size[0]; //пропорция ширины будущего превью
            $y_ratio = $height / $size[1]; //пропорция высоты будущего превью
            $ratio       = min($x_ratio, $y_ratio);
            $use_x_ratio = ($x_ratio == $ratio); //соотношения ширины к высоте
            $new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio); //ширина превью 
            $new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio); //высота превью
            //расхождение с заданными параметрами по ширине
            $new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width) / 2);
            //расхождение с заданными параметрами по высоте
            $new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);
            //создаем вспомогательное изображение пропорциональное превью
            $img = imagecreatetruecolor($width,$height);
            imagefill($img, 0, 0, $rgb); //заливаем его…
            $photo = $icfunc($source); //достаем наш исходник

            imagecopyresampled($img, $photo, $new_left, $new_top, 0, 0, $new_width, $new_height, $size[0], $size[1]); //копируем на него нашу превью с учетом расхождений           

            $func = 'image'.$format;
            $func($img, $preview_dir); //сохраняем результат (превью картинки)
            // Очищаем память после выполнения скрипта
            imagedestroy($img);
            imagedestroy($photo);

            return true;
        }
        return false;
    }

    public function admin_email() {
        $this->request->data = $this->Settings->find('first',array('conditions'=>array('Settings.name'=>'EMAIL')));

    }


    private function _setActiveNavigation($key = 'settings'){
        $this->navsel_[$key] = 'active';
        $this->set('navsel_',$this->navsel_);
    }
}