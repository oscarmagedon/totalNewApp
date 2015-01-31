<?php
class AppError extends ErrorHandler {
 
    function _outputMessage($template) {
        $this->controller->layout = 'error'; 
        // /app/views/layouts/error_template.ctp
        parent::_outputMessage($template);
    }

}