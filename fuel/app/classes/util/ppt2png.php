<?php
//require_one 'EventSink_EApplication.php';

class Util_Ppt2png {
        public static function ConvertPPT2Image($fileName)
        {
                //COMインスタンス作成し、タイプライブラリをロード
                $ppt_com = new COM('PowerPoint.Application');
                if (!com_load_typelib('PowerPoint.Application'))
                {
                        throw new Exception("Cannot load type library of 'PowerPoint.Application'");
                }

                //アプリケーション起動
                $ppt_com->Visible = 1;

                //イベントシンクオブジェクトに接続
                //    $ppt_AppEventSink = new EApplication();
                //    com_event_sink($ppt_com, $ppt_AppEventSink, 'EApplication');

                //ドキュメント変換
                $presentation = $ppt_com->Presentations->Open(realpath($fileName));
                $presentation->SaveAs('\slides.png', ppSaveAsPNG);
                $presentation->Close();

                //アプリケーション終了
                $ppt_com->Quit();
        }

        public static function test () {
                return com_print_typeinfo(new COM('PowerPoint.Application'), 'EApplication');
        }
}