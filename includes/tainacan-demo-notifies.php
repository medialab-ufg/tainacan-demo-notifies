<?php
class TainacanDemoNotice {

    private $timeInterval;

    function __construct($timeInterval = 20) {
        $this->timeInterval = $timeInterval;
        add_action( 'admin_notices', [$this, 'getNotice'] );
    }

    private function remainTime() {
        $response = file_get_contents('http://demo.tainacan.org/log.txt');
        $lastTime = new DateTime($response);
        $currentTime = new DateTime();
        $diffTime = $currentTime->diff($lastTime);
        
        $minutes = $diffTime->days * 24 * 60;
        $minutes += $diffTime->h * 60;
        $minutes += $diffTime->i;
        return $this->timeInterval - $minutes;
    }
    
    private function getTypeNotice($remainTime) {
        if ($remainTime/$this->timeInterval < 0.3)
            return 'error';
        else if ($remainTime/$this->timeInterval < 0.7)
            return 'update-nag';
        else 
            return 'updated';
    }

    function getNotice() {
        $remainTime = round($this->remainTime(), 2);
    ?>
        <div class="<?php echo $this->getTypeNotice($remainTime)?> notice">
            <p><?php echo "Attention! missing $remainTime minutes to restore data of demo tainacan"; ?></p>
        </div>
    <?php
    }
}


