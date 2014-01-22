<?php


class Controller_Ppt extends Controller {

        public function action_index () {

                $ppt = Util_Ppt2png::ConvertPPT2Image('aa');
                //     $fuga = Util_Hoge::fuga('This is');// This is fuga.
                return $ppt;

        }
}