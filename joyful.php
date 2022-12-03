<?php
#┌─────────────────────────────────
#│  JOYFUL NOTE v1.21 (2002/01/15)
#│  Copyright(C) Kent Web 2002
#│  webmaster@kent-web.com
#│  http://www.kent-web.com/
#└─────────────────────────────────
$ver = 'Joyful Note v1.21';
#┌─────────────────────────────────
#│ [注意事項]
#│ 1. このスクリプトはフリーソフトです。このスクリプトを使用した
#│    いかなる損害に対して作者は一切の責任を負いません。
#│ 2. 設置に関する質問はサポート掲示板にお願いいたします。
#│    直接メールによる質問は一切お受けいたしておりません。
#│ 3. 添付の home.gif は L.O.V.E の mayuRin さんによる画像です。
#└─────────────────────────────────
#
# 【ファイル構成例】
#
#  public_html (ホームディレクトリ)
#      |
#      +-- joyful / joyful.php [644]
#            |      joyful.log [666]
#            |      count.dat  [666]
#            |      pastno.dat [666]
#            |      rejpeg     [755]
#            |      repng      [755]
#            |      regif      [755]
#            |
#            +-- img [777] / home.gif, soon.gif, ...
#            |
#            +-- imgs [777] /
#            |
#            +-- past [777] / 1.dat [666]
#            |
#            +-- gif [755] / 0.gif, 1.gif, ...GIFカウンターを使う場合
/////////////////////////////////////////////////////
// KENTさんの"JoyfulNote"をphpに移植したものです。 //
//    http://script.s16.xrea.com/    nobodyさん    //
//                                 2002/09/24      //
/////////////////////////////////////////////////////
#============#
#  設定項目  #
#============#

extract ($HTTP_COOKIE_VARS);
extract ($HTTP_SERVER_VARS);
extract ($HTTP_POST_VARS);
extract ($HTTP_GET_VARS);

# タイトル名を指定
$title = "Joyful Note";

# タイトルの色
$t_color = "#804040";

# タイトルの大きさ（ポイント数:スタイルシートで有効）
$t_size = '24pt';

# タイトル／本文の文字フォント
$face = '"ＭＳ Ｐゴシック", osaka, sans-serif';

# 本文の文字大きさ（ポイント数:スタイルシートで有効）
$b_size = '10pt';

# 壁紙を指定する場合（http://から指定）
$bg = "";

# 背景色を指定
$bc = "#FEF5DA";

# 文字色を指定
$tx = "#000000";

# リンク色を指定
$lk = "#0000FF";	# 未訪問
$vl = "#800080";	# 訪問済
$al = "#FF0000";	# 訪問中
$hl = "#00FF00";	# マウスon

# 戻り先のURL (index.htmlなど)
$homepage = "../";

# 最大記事数 (親記事もレス記事も含めた数）
$max = 50;

# 管理者用マスタパスワード (英数字で８文字以内)
$master = '0123';

# 返信がつくと親記事をトップへ移動 (0=no 1=yes)
$topsort = 1;

# 返信にも添付機能を許可する (0=no 1=yes)
$res_clip = 1;

# タイトルにGIF画像を使用する時 (http://から記述)
$title_gif = "";
$tg_w = 180;	# GIF画像の幅 (ピクセル)
$tg_h = 40;	#    〃    高さ (ピクセル)

# ミニカウンタの設置
# → 0=no 1=テキスト 2=GIF画像
$counter = 1;

# ミニカウンタの桁数
$mini_fig = 6;

# テキストのとき：ミニカウンタの色
$cnt_color = "#BB0000";

# GIFカウンタのとき：画像までのディレクトリ
# → 最後は必ず / で閉じる
$gif_path = "./gif/";
$mini_w = 20;		# 画像の横サイズ
$mini_h = 20;		# 画像の縦サイズ

# カウンタファイル
$cntfile = './count.dat';

# タグの許可 (0=no 1=yes)
$tagkey = 0;

# スクリプトのファイル名
# → フルパスで指定する場合は http:// から記述
$script  = $PHP_SELF;

# ログファイルを指定
# → フルパスで指定する場合は / から記述
$logfile = './joyful.log';

# アップロードディレクトリ
# → パスの最後は / で終わること
# → フルパスだと / から記述する
$ImgDir = "./img/";
$ImgDir2 = "./imgs/";

# 添付ファイルのアップロードに失敗したとき
#   0 : 添付ファイルは無視し、記事は受理する
#   1 : エラー表示して処理を中断する
$clip_error = 1;

# 記事 [タイトル] 部の長さ (全角文字換算)
$sub_len = '15';

# メールアドレスの入力必須 (0=no 1=yes)
$in_email = 0;

# 記事の [タイトル] 部の色
$sub_color = "#880000";

# 記事表示部の下地の色
$tbl_color = "#FFFFFF";

# 同一IPアドレスからの連続投稿時間（秒数）
# → 連続投稿などの荒らし対策
# → 値を 0 にするとこの機能は無効になります
$wait = 0;

# １ページ当たりの記事表示数 (親記事)
$p_log = 5;

# 投稿があるとメール通知する
#  0 : 通知しない
#  1 : 通知するが、自分の投稿記事はメールしない。
#  2 : 通知する。自分の投稿記事も通知する。
$mailing = 0;

# メールアドレス(メール通知する時)
$mailto = 'xxx@xxx.xxx';

# 他サイトから投稿排除時に指定 (http://から書く)
$base_url = "";

# 文字色の設定。
$COLORS = array ('#800000','#DF0000','#008040','#0000FF','#C100C1','#FF80C0','#FF8040','#000080');

# URLの自動リンク (0=no 1=yes)
# → タグ許可の場合は no とすること。
$autolink = 1;

# タグ広告挿入オプション (FreeWebなど）
#   → <!-- 上部 --> <!-- 下部 --> の代わりに「広告タグ」を挿入する。
#   → 広告タグ以外に、MIDIタグ や LimeCounter等のタグにも使用可能です。
$banner1 = '<!-- 上部 -->';	# 掲示板上部に挿入
$banner2 = '<!-- 下部 -->';	# 掲示板下部に挿入

# アクセス制限（ホスト名、IPアドレスを記述）
$deny = array (
	"*.anonymizer.com",
	"cache*.*.interlog.com",
	"211.154.120.*",
	"",
	"",
	"",
	"",
	"",
	""
);

# アップロードを許可するファイル形式
#  0:no  1:yes
$gif   = 1;	# GIFファイル
$jpeg  = 1;	# JPEGファイル
$png   = 1;	# PNGファイル
$text  = 1;	# TEXTファイル
$lha   = 1;	# LHAファイル
$zip   = 1;	# ZIPファイル
$pdf   = 1;	# PDFファイル
$midi  = 1;	# MIDIファイル
$msword= 0;	# WORDファイル
$excel = 0;	# EXCELファイル
$ppt   = 0;	# POWERPOINTファイル
$ram   = 0;	# RAMファイル
$rm    = 0;	# RMファイル
$mpeg  = 0;	# MPEGファイル
$mp3   = 0;	# MP3ファイル

# 投稿受理最大サイズ (bytes)
# → 例 : 102400 = 100KB
$maxdata = 300*1024;

# 画像ファイルの最大表示の大きさ（単位：ピクセル）
# → これを超える画像は縮小表示します
$MaxW = 120;	# 横幅
$MaxH = 120;	# 縦幅

$home_icon = 1;# 家アイコンの使用 (0=no 1=yes)

# アイコン画像ファイル名 (ファイル名のみ)
$IconHome = "home.gif";  # ホーム
$IconClip = "clip.gif";  # クリップ
$IconSoon = "soon.gif";  # COMINIG SOON

# 画像管理者チェック機能 (0=no 1=yes)
# → アップロード「画像」は管理者がチェックしないと表示されない機能です
# → チェックされるまで「画像」は「COMMING SOON」のアイコンが表示されます
$ImageCheck = 0;

#---(以下は「過去ログ」機能を使用する場合の設定です)---#
#
# 過去ログ生成 (0=no 1=yes)
$pastkey = 1;

# 過去ログ用NOファイル
$nofile  = './pastno.dat';

# 過去ログのディレクトリ
# → フルパスなら / から記述（http://からではない）
# → 最後は必ず / で閉じる
$pastdir = './past/';

# 過去ログ１ファイルの行数
# → この行数を超えると次ページを自動生成します
$log_line = '600';
if (ereg ("MSIE 3",$HTTP_USER_AGENT)) { 
	$nam_wid = 30;
	$sub_wid = 40;
	$com_wid = 65;
	$url_wid = 48;
	$nam_wid2 = 20;
} elseif (ereg ("MSIE 4",$HTTP_USER_AGENT) || ereg ("MSIE 5",$HTTP_USER_AGENT)) { 
	$nam_wid = 30;
	$sub_wid = 40;
	$com_wid = 60;
	$url_wid = 70;
	$nam_wid2 = 20;
} else {
	$nam_wid = 20;
	$sub_wid = 25;
	$com_wid = 56;
	$url_wid = 50;
	$nam_wid2 = 10;
}

#============#
#  設定完了  #
#============#

# メイン処理
$host = $REMOTE_HOST;
if (!$host) {
	$host = gethostbyaddr ($REMOTE_ADDR);
}
$flag=0;
while(list(,$value) = each ($deny)) {
	if (!$value) { continue; }
	$value = str_replace("*",".*",$value);
if (ereg($value,$host)) { $flag=1; break; }
}
if ($flag) { error("アクセスを許可されていません");
}
list($c_name,$c_email,$c_url,$c_pwd,$c_color)=explode(",",$JOYFUL);
$c_name = stripslashes($c_name);

#------------------#
#  HTMLのヘッダー  #
#------------------#
function htheader() {
global $HTTP_HOST,$cook,$title,$b_size,$face,$hl,$t_size,$bg,$bc,$tx,$lk,$vl,$al;
echo <<<EOD
<HTML>
<HEAD>
<META http-equiv="Content-type" content="text/html; charset=Shift_JIS">
<META http-equiv="Content-Style-Type" content="text/css">
<TITLE>$title</TITLE>
<STYLE type="text/css">
<!--
BODY,TR,TD,TH { font-size: $b_size; font-family: $face }
A:hover { color: $hl }
SPAN    { font-size: $t_size }
BIG     { font-size: 12pt }
SMALL   { font-size: 9pt }
BODY   { margin-left: 4em; margin-right: 4em}
-->
</STYLE>
</HEAD>
<BODY background="$bg" bgcolor="$bc" text="$tx" link="$lk" vlink="$vl" alink="$al">
EOD;
}

#-----------------#
#  自動URLリンク  #
#-----------------#
function auto_link($file) {
	$file = preg_replace("/([^=^\"]|^)(http\:[\w\.\~\-\/\?\&\+\=\:\@\%\;\#\%]+)/","\\1<a href=\"\\2\" target='_top'>\\2</a>",$file);
	return $file;
}

#--------------#
#  エラー処理  #
#--------------#
function error($mes1){
	htheader();
	echo "<CENTER><HR width=400><H3>ERROR !</H3>
<FONT color=red><B>$mes1</B></FONT>
<P><HR width=400></CENTER>
</BODY></HTML>";
	exit();
}

#----------------#
#  ログ書込処理  #
#----------------#
if($mode=="regist"){
	$ref_url = urldecode ($HTTP_REFERER);
	if ($baseurl) {
		if (ereg($base_url,$ref_url)) { error("不正なアクセスです"); }
	}
	if ($name == "") { error("名前が入力されていません"); }
	if ($comment == "") { error("コメントが入力されていません"); }
	if ($in_email) {
		if ($email == "") { error("Ｅメールが入力されていません"); }
		elseif (!eregi("(.*)\@(.*)\.(.*)",$email)) {
			error("Ｅメールの入力内容が不正です");
		}
	}
	$name = stripslashes($name);
	$sub = stripslashes($sub);
	$comment = stripslashes($comment);
	$name = htmlspecialchars ($name);
	$email = htmlspecialchars ($email);
	$url = htmlspecialchars ($url);
	$sub = htmlspecialchars ($sub);
	$url = str_replace ("http://","", $url);
	$cookval = implode(",", array($name,$email,$url,$pwd,$color));
	setcookie ("JOYFUL", $cookval,time()+60*24*3600);
	list($c_name,$c_email,$c_url,$c_pwd,$c_color)=explode(",",$cookval);
	if ($tagkey) {
		$comment = str_replace("<>","&lt;&gt;",$comment);
	}
	else {$comment = htmlspecialchars ($comment);}
	list($name,$email,$url,$sub) = str_replace (array("\r","\n"),"",array($name,$email,$url,$sub));
	$comment = str_replace (array("\r\n","\r","\n"),"<BR>",$comment);
	$times = time();
	$date = date("Y/m/d(D) H:i",$times);
	$lines = file ($logfile);
	$top = array_shift($lines);
	list($no,$ip,$time2) = explode("<>", $top);
	$no++;
	if ($REMOTE_ADDR == $ip && $wait > $times - $time2) {
		error("連続投稿はもうしばらく時間をおいて下さい");
	}
	#  画像(ファイル)アップロード  #
	////////////////////////////////////////////////////////
	if (file_exists($HTTP_POST_FILES['upfile']['tmp_name'])) {

		$pos = strrpos($HTTP_POST_FILES['upfile']['name'],".");
		$tail = substr($HTTP_POST_FILES['upfile']['name'],$pos,strlen($HTTP_POST_FILES['upfile']['name'])-$pos+1);
		$tail = strtolower ($tail);
		if ($tail == ".jpeg") {$tail = ".jpg";}
		if ($tail == ".mpeg") {$tail = ".mpg";}
		if ($tail == ".midi") {$tail = ".mid";}
		
		$flag=0;
		if ($tail == ".gif" && $gif ) { $flag=1; }
		if ($tail == ".jpg" && $jpeg) { $flag=1; }
		if ($tail == ".png" && $png ) { $flag=1; }
		if ($tail == ".lzh" && $lha ) { $flag=1; }
		if ($tail == ".txt" && $text) { $flag=1; }
		if ($tail == ".zip" && $zip ) { $flag=1; }
		if ($tail == ".pdf" && $pdf ) { $flag=1; }
		if ($tail == ".mid" && $midi) { $flag=1; }
		if ($tail == ".doc" && $word) { $flag=1; }
		if ($tail == ".xls" && $excel) { $flag=1; }
		if ($tail == ".ppt" && $ppt ) { $flag=1; }
		if ($tail == ".ram" && $ram ) { $flag=1; }
		if ($tail == ".rm"  && $rm  ) { $flag=1; }
		if ($tail == ".mpg" && $mpeg) { $flag=1; }
		if ($tail == ".mp3" && $mp3 ) { $flag=1; }

		if ($flag) {
			copy($HTTP_POST_FILES['upfile']['tmp_name'], "$ImgDir$no$tail");
			if ($tail == ".jpg" || $tail == ".gif" || $tail == ".png"){
				($size = GetImageSize ($HTTP_POST_FILES['upfile']['tmp_name'])) || error("画像ファイルが変です");
				$W = $size[0];
				$H = $size[1];
				# 画像表示縮小
				if ($W > $MaxW || $H > $MaxH) {
					$W2 = $MaxW / $W;
					$H2 = $MaxH / $H;
					($W2 < $H2) ? $key = $W2 :  $key = $H2;
					if ($tail == ".jpg") {
						system("./rejpeg $ImgDir$no$tail $ImgDir2$no$tail $key");
					}
					if ($tail == ".png") {
						system("./repng $ImgDir$no$tail $ImgDir2$no$tail $key");
					}
					if ($tail == ".gif") {
						system("./regif $ImgDir$no$tail $ImgDir2$no$tail $key");
					}
				}
			}
		}elseif($clip_error){ error("アップロードできないファイル形式です"); }
	}
	////////////////////////////////////////////////////////
	if ($pwd != "") { $ango = crypt($pwd); }
	if ($reno == "") {
		$i=0;
		$stop=0;
		while (list (, $line) = each ($lines)) {
			list($no2,$reno2,$d,$n,$m,$s,$com,
				$u,$ho,$p,$c,$tail2,$w,$h,$chk) = explode("<>",$line);
			$i++;
			if ($i > $max-1 && $reno2 == "") { $stop=1; }
			if (!$stop) { $new .= $line; }
			else {
				if ($pastkey) { $data[] = $line; }
				if (file_exists ("$ImgDir$no2$tail2")) { unlink("$ImgDir$no2$tail2"); }
				if (file_exists ("$ImgDir2$no2$tail2")) { unlink("$ImgDir2$no2$tail2"); }
			}
		}
		$new = "$no<><>$date<>$name<>$email<>$sub<>$comment<>$url<>$host<>$ango<>$color<>$tail<>$W<>$H<>0<>\n".$new;
		$new = "$no<>$REMOTE_ADDR<>$times<>\n".$new;

		# 過去ログ更新
		if ($data) {
			$past_flag=0;
			# 過去NOを開く
			$no = file($nofile);
			$count = $no[0];

			# 過去ログのファイル名を定義
			$pastfile  = "$pastdir$count.dat";
			# 過去ログを開く
			$past = file ($pastfile);
			# 規定の行数をオーバーすると次ファイルを自動生成
			if (count($past) > $log_line) {
				$past_flag=1;

				# カウントファイル更新
				$count++;
				$out = fopen($nofile,"w");
				fputs ($out, $count);
				fclose($out);
				$pastfile = "$pastdir$count.dat";
				$past = array();
			}

			while (list(,$line) = each($data)) {
				list($pno,$preno,$pdate,$pname,$pmail,$psub,$pcom,$purl,$pho) = explode("<>",$line);
				if ($pmail) { $pname = "<A href=\"mailto:$pmail\">$pname</A>"; }
				if ($purl) { $purl = "&lt;<A href=\"http://$purl\" target='_top'>HOME</A>&gt;"; }
				if ($preno) { $pno = "Res: $preno"; }

				# 保存記事をフォーマット
				$temp .= "<HR>[<B>$pno</B>] <FONT color=\"$sub_color\"><B>$psub</B></FONT> 投稿者：<B>$pname</B> <SMALL>投稿日：$pdate</SMALL> $purl<BR><BLOCKQUOTE>$pcom</BLOCKQUOTE><!-- $pho -->\n";
			}

			# 過去ログを更新
			$out = fopen ($pastfile,"w+");
			fputs ($out,$temp);
			while (list(,$temp)=each($past)){
				fputs($out,$temp);
			}
			fclose($out);
		}
	}
	# レス記事の場合：トップソートあり
	elseif ($reno && $topsort) {
		$match=0;
		$new="";
		$tmp="";
		while (list (, $line) = each ($lines)) {
			list($no2,$reno2) = explode("<>",$line);
			if ($reno == $no2) {
				$match=1;
				$new .= $line;
			}
			elseif ($reno == $reno2) {
				$new .= $line;
			}
			elseif ($match == 1 && $reno == $reno2) {
				$match=2;
				$new .= "$no<>$reno<>$date<>$name<>$email<>$sub<>$comment<>$url<>$host<>$ango<>$color<>$tail<>$W<>$H<>0<>\n";
				$tmp .= $line;
			}
			else { $tmp .= $line; }
		}

		if ($match == 1) {
			$new .= "$no<>$reno<>$date<>$name<>$email<>$sub<>$comment<>$url<>$host<>$ango<>$color<>$tail<>$W<>$H<>0<>\n";
		}
		$new .= $tmp;

		# 更新
		$new = "$no<>$REMOTE_ADDR<>$times<>\n".$new;
	}
	# レス記事の場合：トップソートなし
	else {
		$match=0;
		$new="";
		while (list (, $line) = each ($lines)) {
			list($no2,$reno2) = explode("<>",$line);
			if ($match == 0 && $reno == $no2) { $match=1; }
			elseif ($match == 1 && $reno != $reno2) {
				$match=2;
				$new .= "$no<>$reno<>$date<>$name<>$email<>$sub<>$comment<>$url<>$host<>$ango<>$color<>$tail<>$W<>$H<>0<>\n";
			}
			$new .= $line;
		}
		if ($match == 1) {
			$new .= "$no<>$reno<>$date<>$name<>$email<>$sub<>$comment<>$url<>$host<>$ango<>$color<>$tail<>$W<>$H<>0<>\n";
		}
		# 更新
		$new = "$no<>$REMOTE_ADDR<>$times<>\n".$new;
	}

	# メール処理
	if (($mailing == 2)||($mailing == 1 && $email != $mailto)) {
		# メールタイトルを定義
		$MailSub = "[$title : $no] $sub";

		# 記事の改行・タグを復元
		$com = eregi_replace("<br>","\n",$comment);
		$com = str_replace("&lt;","<",$com);
		$com = str_replace("&gt;",">",$com);
		$com = str_replace("&quot;","\"",$com);

		# メール本文を定義
		$MailBody = <<<EOM
投稿日時：$date
ホスト名：$host
ブラウザ：$HTTP_USER_AGENT

投稿者名：$name
Ｅメール：$email
ＵＲＬ  ：$url
タイトル：$sub
投稿記事：

$com
EOM;

		# メールアドレスがない場合はダミーメールに置き換え
		if ($email == "") { $email = 'nomail@xxx.xxx'; }
		mb_language ("ja");
		mb_send_mail($mailto,$MailSub,$MailBody,"From: $email");
	}

	# 更新
	$fp = fopen ($logfile,"w+");
	fputs($fp,$new);
	fclose($fp);
}

#----------------#
#  返信フォーム  #
#----------------#
if ($mode == "res") {
	
	# ログを読み込み
	$in = file($logfile);
	$top = array_shift($in);

	# ヘッダを出力
	htheader();

	# 関連記事出力
	print "[<A href=\"javascript:history.back()\">戻る</A>]\n<P>";
	print "- 以下は、記事NO. <B>$no</B> に関する <A href='#RES'>返信フォーム</A> です -<HR>\n";
	$flag=0;
	while (list (, $line) = each ($in))  {
		list($no2,$reno,$date,$name,$mail,$sub,$com,$url) = explode("<>",$line);
		if (!$reno) { $com = "<BLOCKQUOTE>$com</BLOCKQUOTE>"; }
		if ($no == $no2 || $no == "$reno") {
			if ($no == $no2) { $resub = $sub; }
			if ($url) { $url = "&lt;<A href=\"http://$url\">HOME</A>&gt;"; }
			if ($reno && !$flag) { print "<BLOCKQUOTE>\n"; $flag=1; }
			print "<FONT color=$sub_color><B>$sub</B></FONT> 投稿者：<B>$name</B> 投稿日：$date $url <FONT color=$sub_color>No.$no2</FONT><BR>$com\n<P>";
		}
	}
	if ($flag) { print "</BLOCKQUOTE>\n"; }
	print "<HR>\n";

	# タイトル名
	if (!ereg("^Re:",$resub)) { $resub = "Re: $resub"; }

	print "<A name=\"RES\"></A>\n";
	if ($res_clip) {
		print "<FORM action=\"$script\" method=\"POST\" enctype=\"multipart/form-data\">\n";
	} else {
		print "<FORM action=\"$script\" method=\"POST\">\n";
	}

	echo <<<EOD
<INPUT type=hidden name=mode value="regist">
<INPUT type=hidden name=reno value="$no">
<BLOCKQUOTE>
<TABLE>
<TR>
  <TD nowrap><B>おなまえ</B></TD>
  <TD><INPUT type=text name=name value="$c_name" size=$nam_wid></TD>
</TR>
<TR>
  <TD nowrap><B>Ｅメール</B></TD>
  <TD><INPUT type=text name=email value="$c_email" size=$nam_wid></TD>
</TR>
<TR>
  <TD nowrap><B>タイトル</B></TD>
  <TD><INPUT type=text name=sub value="$resub" size=$sub_wid>
  <INPUT type=submit value="返信する"><input type=reset value="リセット"></TD>
</TR>
<TR>
  <TD colspan=2><B>メッセージ</B><BR>
  <TEXTAREA cols=$com_wid rows=5 name=comment wrap="soft"></TEXTAREA></TD>
</TR>
<TR>
  <TD nowrap><B>ＵＲＬ</B></TD>
  <TD><INPUT type=text name=url value="http://$c_url" size=$url_wid></TD>
</TR>
EOD;
	if ($res_clip) {
		print "<TR><TD><B>添付File</B></TD>\n";
		print "<INPUT TYPE=hidden name=MAX_FILE_SIZE value=\"$maxdata\">\n";
		print "<TD><INPUT type=file name=upfile size=\"$sub_wid\"></TD></TR>\n";
	}
	print "<TR><TD nowrap><B>削除キー</B>";
	print "<TD><INPUT type=password name=pwd size=8 maxlength=8 value=\"$c_pwd\">\n";
	print "<SMALL>(自分の記事を削除時に使用。英数字で8文字以内)</SMALL></TD></TR>\n";
	print "<TR><TD nowrap><B>文字色</B></TD><TD>\n";

	# クッキーの色情報がない場合
	if ($c_color == "") { $c_color = $COLORS[0]; }
	while (list(, $value) = each ($COLORS)) {
		if ($c_color == $value) {
			print "      <INPUT type=radio name=color value=\"$value\" checked>";
			print "<FONT color=\"$value\">■</FONT>\n";
		} else {
			print "      <INPUT type=radio name=color value=\"$value\">";
			print "<FONT color=\"$value\">■</FONT>\n";
		}
	}
	print "</TD></TR></TABLE></FORM>\n";
	print "</BLOCKQUOTE>\n";
	print "</BODY></HTML>";
	exit();
}

#--------------#
#  管理モード  #
#--------------#
if ($mode == "admin") {
	if ($pass == "") {
		htheader();
		print "<center><h4>パスワードを入力して下さい</h4>\n";
		print "<form action=\"$script\" method=\"POST\">\n";
		print "<input type=hidden name=mode value=\"admin\">\n";
		print "<input type=hidden name=action value=\"del\">\n";
		print "<input type=password name=pass size=8>";
		print "<input type=submit value=\" 認証 \"></form>\n";
		print "</center>\n</body></html>\n";
		exit();
	}
	if ($pass != $master) { error("パスワードが違います"); }

	htheader();
	print "[<a href=\"$script?\">掲示板に戻る</a>]\n";
	print "<table width='100%'><tr><th bgcolor=\"#804040\">\n";
	print "<font color=\"#FFFFFF\">管理モード</font>\n";
	print "</th></tr></table>\n";

	# 画像許可
	if ($chk) {
		# 許可情報をマッチングし更新
		$in = file($logfile);
		$top = array_shift($in);
		while (list (, $line) = each ($in))  {
			list($no,$reno,$d,$n,$m,$s,$com,$u,$ho,$p,$c,$t,$w,$h,$check) = explode("<>",$line);
			reset($chk);
			while (list(,$xx) = each($chk)) {
				if ($no == $xx) {
					$line = "$no<>$reno<>$d<>$n<>$m<>$s<>$com<>$u<>$ho<>$p<>$c<>$t<>$w<>$h<>1<>\n";
					break;
				}
			}
			$new .= $line;
		}

		# 更新
		$new = $top.$new;
		$fp = fopen($logfile,"w");
		fputs($fp,$new);
		fclose($fp);
	}
	# 削除処理
	if ($del) {
		# 削除情報をマッチングし更新
		$in = file($logfile);
		$top = array_shift($in);
		while (list (, $line) = each ($in)) {
			$flag=0;
			list($no,$reno,$d,$n,$m,$s,$com,$u,$ho,$p,$c,$tail,$w,$h,$chk) = explode("<>",$line);
			reset($del);
			while (list(,$val) = each($del)) {
				if ($no == $val || $reno == $val) {
					if (file_exists ("$ImgDir$no$tail")) {
						unlink("$ImgDir$no$tail");
					}
					if (file_exists ("$ImgDir2$no$tail")) {
						unlink("$ImgDir2$no$tail"); }
					$flag=1;
					break;
				}
			}
			if ($flag == 0) {$new .= $line; }
		}

		# 更新
		$new = $top.$new;
		$fp = fopen($logfile,"w");
		fputs($fp,$new);
		fclose($fp);
	}

	# 管理を表示
	if ($page == "") { $page = 0; }
	print "<P><center><table><tr><td>\n<UL>\n";
	print "<LI>記事を削除する場合は「削除」のチェックボックスにチェックを入れ「送信する」を押して下さい。\n";
	print "<LI>画像許可を行なう場合は「画像許可」のチェックボックスにチェックを入れ「送信する」を押して下さい。\n";
	print "</UL>\n</td></tr></table>\n";
	print "<form action=\"$script\" method=\"POST\">\n";
	print "<input type=hidden name=mode value=\"admin\">\n";
	print "<input type=hidden name=page value=\"$page\">\n";
	print "<input type=hidden name=pass value=\"$pass\">\n";
	print "<input type=hidden name=action value=\"$action\">\n";
	print "<input type=submit value=\"送信する\">";
	print "<input type=reset value=\"リセット\">\n";
	print "<P><table border=0 cellspacing=1><tr>\n";
	print "<th nowrap>削除</th><th nowrap>記事NO</th><th>投稿日</th>";
	print "<th>タイトル</th><th>投稿者</th><th>URL</th><th>コメント</th>";
	print "<th>ホスト名</th><th>画像<br>(bytes)</th>\n";

	$line=9;
	if ($ImageCheck) { print "<th>画像<br>許可</th>"; $line=10; }

	print "</tr>\n";

	$in = file($logfile);
	$top = array_shift($in);
	$i=0;
	while (list(,$value) = each($in)) {
		$img_flag=0;
		list($no,$reno,$date,$name,$mail,$sub,$com,
			$url,$host,$pw,$color,$tail,$w,$h,$chk) = explode("<>",$value);

		if ($mail) { $name="<a href=\"mailto:$mail\">$name</a>"; }
		list($date,$dmy) = explode("\(", $date);

		if ($url) { $url = "&lt;<a href=\"http://$url\" target='_top'>Home</a>&gt;"; }
		else { $url = '-'; }

		htmlspecialchars($com);
		if (strlen($com) > 40) {
			$com = substr($com,0,38);
			$com .= "...";
		}
		if (file_exists("$ImgDir$no$tail")) {
			if ($tail == ".gif" || $tail == ".jpg" || $tail == ".png") {
				$img_flag = 1;
				$File = "画像";
			} else { $File = "File"; }
			$clip = "<a href=\"$ImgDir$no$tail\" target='_blank'>$File</a>";
			$size = filesize ("$ImgDir$no$tail");
			$all += $size;
		} else {
			$clip = "";
			$size = 0;
		}
		if ($reno == "") { print "<tr><th colspan=$line><hr></th></tr>\n"; }

		# チェックボックス
		print "<tr><th><input type=checkbox name=del[] value=\"$no\"></th>";
		print "<td align=center>$no</td>";
		print "<td><small>$date</small></td><th>$sub</th><th>$name</th>";
		print "<td align=center>$url</td><td><small>$com</small></td>";
		print "<td><small>$host</small></td><td align=center>$clip<br>($size)</td>\n";
		# 画像許可
		if ($ImageCheck) {
			if ($img_flag == 1 && $chk == 1) {
				print "<th>OK</th>";
			} elseif ($img_flag == 1 && $chk != 1) {
				print "<th><input type=checkbox name=chk[] value=$no></th>";
			} else {
				print "<td><br></td>";
			}
		}
		print "</tr>\n";
	}

	print "<tr><th colspan=$line><hr></th></tr>\n";
	print "</table></form>\n";

	$all = floor($all / 1024);
	print "【添付データ総数 ： <b>$all</b> KB】\n";
	print "</center>\n";
	print "</body></html>\n";
	exit();
}

#------------------#
#  ユーザ記事削除  #
#------------------#
if ($mode == "usr_del") {
	if ($no == '' || $pwd == '')
		{ error("記事Noまたは削除キーが入力モレです"); }
	$lines = file ($logfile);
	$top = array_shift($lines);

	$flag=0;
	while (list (, $line) = each ($lines)) {
		list($no2,$reno2,$date,$name,$mail,$sub,$com,
			$url,$host,$pw,$color,$tail,$w,$h,$chk) = explode("<>",$line);

		if ($flag == 0 && $no2 == $no) {
			if ($pw == '') {
				error("該当記事には削除キーが設定されていません");
			}
			# 削除キーを照合
			if (crypt($pwd,$pw) != $pw) { error("削除キーが違います"); }

			# 添付ファイル削除
			if (file_exists ("$ImgDir$no$tail")) { unlink("$ImgDir$no$tail"); }
			if (file_exists ("$ImgDir2$no$tail")) { unlink("$ImgDir2$no$tail"); }
			if ($reno2 == "") { $flag=2; }
			else { $flag=1; }
		}
		elseif ($flag == 2 && $no == $reno2) {
			if (file_exists ("$ImgDir$no$tail")) { unlink("$ImgDir$no$tail"); }
			if (file_exists ("$ImgDir2$no$tail")) { unlink("$ImgDir2$no$tail"); }
			continue;
		}
		else { $new .= $line; }
	}
	if ($flag == 0) { error("該当記事が見当たりません"); }

	# 更新
	$new = $top.$new;
	$fp = fopen ($logfile,"w");
	fputs($fp,$new);
	fclose($fp);

}

#----------------#
#  記事修正処理  #
#----------------#
if ($mode == "usr_edt") {
	if ($no == '' || $pwd == '') {
		error("記事Noまたはパスワードが入力モレです");
	}

	if ($action == "edit") {
		$ref_url = urldecode ($HTTP_REFERER);
		if ($baseurl) {
			if (ereg($base_url,$ref_url)) { error("不正なアクセスです"); }
		}
		if ($name == "") { error("名前が入力されていません"); }
		if ($comment == "") { error("コメントが入力されていません"); }
		if ($in_email) {
			if ($email == "") { error("Ｅメールが入力されていません"); }
			elseif (!eregi("(.*)\@(.*)\.(.*)",$email)) {
				error("Ｅメールの入力内容が不正です");
			}
		}
		$url = str_replace ("http://","", $url);
	}

	$flag=0;
	$lines = file ($logfile);
	$top = array_shift($lines);
	while (list (, $line) = each ($lines)) {
		list($no2,$reno,$date,$name2,$mail,$sub2,$com,
			$url2,$host,$pw,$color2,$tail,$w,$h,$chk) = explode("<>",$line);

		if ($no2 == $no) {
			$pw2 = $pw;
			$flag=1;
			if ($action != "edit") { break; }
			else {
				$name = htmlspecialchars ($name);
				$email = htmlspecialchars ($email);
				$url = htmlspecialchars ($url);
				$sub = htmlspecialchars ($sub);
				$comment = stripslashes($comment);
				if ($tagkey) {
					$comment = str_replace("<>","&lt;&gt;",$comment);
				}
				else {$comment = htmlspecialchars ($comment);}
				$comment = str_replace (array("\r\n","\r","\n"),"<BR>",$comment);
				$line = "$no<>$reno<>$date<>$name<>$email<>$sub<>$comment<>$url<>$host<>$pw<>$color<>$tail<>$w<>$h<>$chk<>\n";
			}
		}
		if ($action == "edit") { $new .= $line; }
	}
	if (!$flag) { error("該当の記事が見当たりません"); }
	if ($pw2 == "") { error("パスワードが設定されていません"); }
	if (crypt($pwd,$pw2) != $pw2) { error("パスワードが違います"); }

	if ($action == "edit") {
		$new = $top.$new;
		$fp = fopen ($logfile,"w");
		fputs($fp,$new);
		fclose($fp);

		$cookval = implode(",", array($name,$email,$url,$pwd,$color));
		setcookie ("JOYFUL", $cookval,time()+60*24*3600);
	
		if ($url) { $url = "<A href=\"http://$url\" target=\"_top\">http://$url</A>"; }
		if ($email) { $email = "<A href=\"mailto:$email\">$email</A>"; }

		htheader();
		print "<DIV align=center>\n";
		print "<B>- 以下のとおり修正が完了しました -</B>\n";
		print "<P><TABLE border=1 cellpadding=10 width='85%'><TR><TD bgcolor=\"$tbl_color\">\n";
		print "おなまえ：<B>$name</B><BR>\n";
		print "Ｅメール：$email<BR>\n";
		print "題　名：<B>$sub</B><BR>\n";
		print "ＵＲＬ：$url</BR><BR>\n";
		print "<FONT color=\"$color\">$comment</FONT>\n";
		print "</TD></TR></TABLE>\n";
		print "<P><FORM action=\"$script\">\n";
		print "<INPUT type=submit value='リストに戻る'></FORM>\n";
		print "</DIV>\n</BODY>\n</HTML>\n";
		exit();
	}
	$com = str_replace("<BR>","\n",$com);
	htheader();
	echo <<<EOD
<B>- 変更する部分のみ修正して送信ボタンを押して下さい -</B>
<P><FORM action="$script" method="POST">
<INPUT type=hidden name=mode value="usr_edt">
<INPUT type=hidden name=action value="edit">
<INPUT type=hidden name=pwd value="$pwd">
<INPUT type=hidden name=no value="$no">
<TABLE border=0 cellspacing=0 cellpadding=1>
<TR>
  <TD nowrap><B>おなまえ</B></TD>
  <TD><INPUT type=text name=name size="$nam_wid" value="$name2"></TD>
</TR>
<TR>
  <TD nowrap><B>Ｅメール</B></TD>
  <TD><INPUT type=text name=email size="$nam_wid" value="$mail"></TD>
</TR>
<TR>
  <TD nowrap><B>題　　名</B></TD>
  <TD>
    <INPUT type=text name=sub size="$sub_wid" value="$sub2"> 
    <INPUT type=submit value="送信する"><INPUT type=reset value="リセット">
  </TD>
</TR>
<TR>
  <TD colspan=2>
    <B>コメント</B><BR>
    <TEXTAREA cols="$com_wid" rows=7 name=comment wrap=soft>$com</TEXTAREA>
  </TD>
</TR>
<TR>
  <TD nowrap><B>ＵＲＬ</B></TD>
  <TD><input type=text size="$url_wid" name=url value="http://$url2"></TD>
</TR>
EOD;

	print "<TR><TD nowrap><B>文字色</B></TD><TD>\n";
	while (list(, $value) = each ($COLORS)) {
		if ($color2 == $value) {
			print "      <INPUT type=radio name=color value=\"$value\" checked>";
			print "<FONT color=\"$value\">■</FONT>\n";
		} else {
			print "      <INPUT type=radio name=color value=\"$value\">";
			print "<FONT color=\"$value\">■</FONT>\n";
		}
	}
	print "</TABLE></FORM></CENTER>\n</BODY>\n</HTML>\n";
	exit();
}

#----------------------------#
#  掲示板の使い方メッセージ  #
#----------------------------#
if ($mode == "howto") {
	if ($tagkey == 0) { $tag_msg = "投稿内容には、<B>タグは一切使用できません。</B>\n"; }
	else { $tag_msg = "コメント欄には、<B>タグ使用をすることができます。</B>\n"; }
	if ($in_email) {
		$eml_msg = "記事を投稿する上での必須入力項目は<B>「おなまえ」「Ｅメール」「メッセージ」</B>です。ＵＲＬ、題名、削除キーは任意です。";
	} else {
		$eml_msg = "記事を投稿する上での必須入力項目は<B>「おなまえ」</B>と<B>「メッセージ」</B>です。Ｅメール、ＵＲＬ、題名、削除キーは任意です。";
	}

	$maxkb = floor($maxdata/1024);
	if ($gif) { $FILE .= "GIF, "; }
	if ($jpeg) { $FILE .= "JPEG, "; }
	if ($png) { $FILE .= "PNG, "; }
	if ($text) { $FILE .= "TEXT, "; }
	if ($lha) { $FILE .= "LHA, "; }
	if ($zip) { $FILE .= "ZIP, "; }
	if ($pdf) { $FILE .= "PDF, "; }
	if ($midi) { $FILE .= "MIDI, "; }
	if ($msword) { $FILE .= "WORD, "; }
	if ($excel) { $FILE .= "EXCEL, "; }
	if ($ppt) { $FILE .= "POWERPOINT, "; }
	if ($rm) { $FILE .= "RM, "; }
	if ($ram) { $FILE .= "RAM, "; }
	if ($mpeg) { $FILE .= "MPEG, "; }
	if ($mp3) { $FILE .= "MP3, "; }
	$FILE = substr($FILE,0,strlen($FILE)-2);

	htheader();
	echo <<<EOD
[<A href="$script?">掲示板にもどる</A>]
<TABLE width="100%">
<TR><TH bgcolor="#880000">
  <FONT color="#FFFFFF">掲示板の利用上の注意</FONT>
</TH></TR></TABLE>
<P><CENTER>
<TABLE width="90%" border=1 cellpadding=10>
<TR><TD bgcolor="$tbl_color">
<OL>
<LI>この掲示板は<B>クッキー対応</B>です。１度記事を投稿いただくと、おなまえ、Ｅメール、ＵＲＬ、削除キーの情報は２回目以降は自動入力されます。（ただし利用者のブラウザがクッキー対応の場合）<P>
<LI>画像などのバイナリーファイルをアップロードすることが可能です。
<P>
  <UL>
  <LI>添付可能ファイル : $FILE
  <LI>最大投稿データ量 : $maxkb KB
  <LI>画像は横 $MaxW ピクセル、縦 $MaxH ピクセルを超えると縮小表示されます。
  </UL>
<P>
<LI>$tag_msg<P>
<LI>$eml_msg<P>
<LI>記事には、<B>半角カナは一切使用しないで下さい。</B>文字化けの原因となります。<P>
<LI>記事の投稿時に<B>「削除キー」</B>にパスワード（英数字で8文字以内）を入れておくと、その記事は次回<B>削除キー</B>によって削除することができます。<P>
<LI>記事の保持件数は<B>最大 $max 件</B>です。それを超えると古い順に自動削除されます。<P>
<LI>既存の記事に<B>「返信」</B>をすることができます。各記事の上部にある<B>「返信」</B>ボタンを押すと返信用フォームが現れます。<P>
<LI>過去の投稿記事から<B>「キーワード」によって簡易検索ができます。</B>トップメニューの<A href="$script?mode=find">「ワード検索」</A>のリンクをクリックすると検索モードとなります。<P>
<LI>管理者が著しく不利益と判断する記事や他人を誹謗中傷する記事は予告なく削除することがあります。
</OL>
</TD></TR></TABLE>
</CENTER>
</BODY>
</HTML>
EOD;
	exit();
}

#------------#
#  過去ログ  #
#------------#
if ($mode == "past") {
	$no = file($nofile);
	$pastno = $no[0];

	if (!$pastlog) { $pastlog = $pastno; }

	htheader();
	echo <<<EOD
[<A href="$script?">掲示板に戻る</A>]
<TABLE width="100%"><TR><TH bgcolor="#880000">
  <FONT color="#FFFFFF">過去ログ[$pastlog]</FONT>
</TH></TR></TABLE>
<P><TABLE border=0><TR><TD>
<FORM action="$script" method="POST">
<INPUT type=hidden name="mode" value="past">
過去ログ：<SELECT name="pastlog">
EOD;

	$pastkey = $pastno;
	while ($pastkey > 0) {
		if ($pastlog == $pastkey) {
			print "<OPTION value=\"$pastkey\" selected>$pastkey Page\n";
		} else {
			print "<OPTION value=\"$pastkey\">$pastkey Page\n";
		}
		$pastkey--;
	}
	print "</SELECT>\n<INPUT type=submit value='移動'></TD></FORM>\n";
	print "<TD width=30></TD><TD>\n";
	print "<FORM action=\"$script\" method=\"POST\">\n";
	print "<INPUT type=hidden name=mode value=past>\n";
	print "<INPUT type=hidden name=pastlog value=\"$pastlog\">\n";
	print "ワード検索：<INPUT type=text name=word size=30 value=\"$word\">\n";
	print "条件：<SELECT name=cond>\n";
	$a = array("AND", "OR");
	while (list(,$value) = each ($a)) {
		if ($cond == $value) {
			print "<OPTION value=\"$value\" selected>$value\n";
		} else {
			print "<OPTION value=\"$value\">$value\n";
		}
	}
	print "</SELECT>\n";
	print "表示：<SELECT name=view>\n";
	if ($view == "") { $view = $p_log; }
	$a = array (5,10,15,20,25,30);
	while (list(,$value) = each($a)) {
		if ($view == $value) {
			print "<OPTION value=\"$value\" selected>$value 件\n";
		} else {
			print "<OPTION value=\"$value\">$value 件\n";
		}
	}
	print "</SELECT>\n<INPUT type=submit value='検索'></TD></FORM>\n";
	print "</TR></TABLE>\n";

	# 表示ログを定義
	$file = "$pastdir$pastlog.dat";
	if ($page == "") { $page = 0; }
	# ワード検索処理
	if ($word != "") {
		$word = str_replace("　"," ",$word);
		$word = ereg_replace("[[:space:]]+"," ",$word);
		$word = ltrim($word);
		$pairs = explode(" ", $word);
		$in = file($file);
		while (list (,$line) = each($in)) {
			$flag=0;
			reset($pairs);
			while (list(,$value)  = each ($pairs)) {
				if (strpos($line,$value,0)) {
					$flag=1;
					if ($cond == 'OR') { break; }
				} else {
					if ($cond == 'AND') { $flag=0; break; }
				}
			}
			if ($flag) { $new[] = $line; }
		}

		$count = count($new);
		print "検索結果：<B>$count</B>件\n";
		$end_data = count($new) - 1;
		$page_end = $page + $view - 1;
		if ($page_end >= $end_data) { $page_end = $end_data; }

		$next_line = $page_end + 1;
		$back_line = $page - $view;

		$enwd = urlencode($word);
		if ($back_line >= 0) {
			print "[<A href=\"$script?mode=past&page=$back_line&word=$enwd&view=$view&cond=$cond&pastlog=$pastlog\">前の $view 件</A>]\n";
		}
		if ($page_end != "$end_data") {
			print "[<A href=\"$script?mode=past&page=$next_line&word=$enwd&view=$view&cond=$cond&pastlog=$pastlog\">次の $view 件</A>]\n";
		}
		# 表示開始
		$i = $page;
		while ($i <= $page_end) {
			print $new[$i];
			$i ++;
		}
		print "<HR>\n</BODY></HTML>\n";
		exit();
	}

	# ページ区切り処理
	$start = $page + 1;
	$end   = $page + $p_log;

	$i=0;
	$in = file($file);
	while (list(,$line) = each($in)) {
		$flag=0;
		if (eregi("^<hr>\[<b>[0-9]+\<\/b\>\]",$line)) { $flag=1; $i++; }
		if ($i < $start) { continue; }
		if ($i > $end) { break; }

		if ($flag) { print $line; }
		else {
			$line = eregi_replace("<hr>","",$line);
			print "<BLOCKQUOTE>$line</BLOCKQUOTE>\n";
		}
	}
	print "<HR>\n";

	$next_page = $page + $p_log;
	$back_page = $page - $p_log;

	print "<TABLE>\n";
	if ($back_page >= 0) {
		print "<TD><FORM action=\"$script\" method=\"POST\">\n";
		print "<INPUT type=hidden name=mode value=past>\n";
		print "<INPUT type=hidden name=pastlog value=\"$pastlog\">\n";
		print "<INPUT type=hidden name=page value=\"$back_page\">\n";
		print "<INPUT type=submit value=\"前の $p_log 件\">\n";
		print "</TD></FORM>\n";
	}
	if ($next_page < $i) {
		print "<TD><FORM action=\"$script\" method=\"POST\">\n";
		print "<INPUT type=hidden name=mode value=past>\n";
		print "<INPUT type=hidden name=pastlog value=\"$pastlog\">\n";
		print "<INPUT type=hidden name=page value=\"$next_page\">\n";
		print "<INPUT type=submit value=\"次の $p_log 件\">\n";
		print "</TD></FORM>\n";
	}
	print "</TABLE>\n</BODY>\n</HTML>\n";
	exit();
}

#------------------#
#  ワード検索処理  #
#------------------#
if ($mode =="find") {
	htheader();
	echo <<<EOD
[<A href="$script?">掲示板にもどる</A>]
<TABLE width="100%">
<TR><TH bgcolor="#880000">
  <FONT color="#FFFFFF">ワード検索</FONT>
</TH></TR></TABLE>
<P>
<UL>
  <LI>検索したい<B>キーワード</B>を入力し、「条件」「表示」を選択して「検索」ボタンを押して下さい。
  <LI>キーワードは「半角スペース」で区切って複数指定することができます。
<P><FORM action="$script" method="POST">
<INPUT type="hidden" name="mode" value="find">
キーワード：<INPUT type="text" name="word" size="30" value="$word">
条件：<SELECT name="cond">
EOD;
	if (!$cond) { $cond = "AND"; }
	$a = array("AND", "OR");
	while (list(,$value) = each ($a)) {
		if ($cond == $value) {
			print "<OPTION value=\"$value\" selected>$value\n";
		} else {
			print "<OPTION value=\"$value\">$value\n";
		}
	}
	print "</SELECT>\n";
	print "表示：<SELECT name=\"view\">\n";
	if ($view == "") { $view = $p_log; }
	$a = array (5,10,15,20);
	while (list(,$value) = each($a)) {
		if ($view == $value) {
			print "<OPTION value=\"$value\" selected>$value 件\n";
		} else {
			print "<OPTION value=\"$value\">$value 件\n";
		}
	}
	print "</SELECT>\n";
	print "<INPUT type=\"submit\" value=\"検索\"></FORM>\n</UL>\n";

	# ワード検索の実行と結果表示
	if ($word != "") {

		# 入力内容を整理
		$word = str_replace("　"," ",$word);
		$word = ereg_replace("[[:space:]]+"," ",$word);
		$word = ltrim($word);
		$pairs = explode(" ", $word);
		
		# ファイルを読み込み
		$in = file($logfile);
		$top = array_shift($in);
		while (list(,$line) = each($in)) {
			$flag=0;
			reset($pairs);
			while (list(,$value)  = each ($pairs)) {
				if (strpos($line,$value,0)) {
					$flag=1;
					if ($cond == 'OR') { break; }
				} else {
					if ($cond == 'AND') { $flag=0; break; }
				}
			}
			if ($flag) { $new[] = $line; }
		}
		
		# 検索終了
		$count = count($new);
		print "検索結果：<B>$count</B>件\n";
		if ($page == '') { $page = 0; }
		$end_data = count($new) - 1;
		$page_end = $page + $view - 1;
		if ($page_end >= $end_data) { $page_end = $end_data; }

		$next_line = $page_end + 1;
		$back_line = $page - $view;

		$enwd = urlencode($word);
		if ($back_line >= 0) {
			print "[<A href=\"$script?mode=find&page=$back_line&word=$enwd&view=$view&cond=$cond\">前の $view 件</A>]\n";
		}
		if ($page_end != "$end_data") {
			print "[<A href=\"$script?mode=find&page=$next_line&word=$enwd&view=$view&cond=$cond\">次の $view 件</A>]\n";
		}
		print "[<A href=\"$script?mode=find\">検索やり直し</A>]\n";

		$i = $page;
		while ($i <= $page_end) {
			list($no,$reno,$date,$name,$email,$sub,$com,$url) = explode("<>", $new[$i]);
			if ($email) { $name = "<A href=\"mailto:$email\">$name</A>"; }
			if ($url) { $url = "&lt;<A href=\"http://$url\" target='_top'>HOME</A>&gt;"; }
			if ($reno) { $no = "$renoへのレス"; }

			# 結果を表示
			print "<HR>[<B>$no</B>] <FONT color=\"$sub_color\"><B>$sub</B></FONT>";
			print " 投稿者：<B>$name</B> <SMALL>投稿日：$date</SMALL> $url<BR>\n";
			print "<BLOCKQUOTE>$com</BLOCKQUOTE>\n";
			$i ++;
		}
		print "<HR>\n";
	}
	print "</BODY></HTML>\n";
	exit();
}

#--------------#
#  記事表示部  #
#--------------#
htheader();
#  カウンタ処理
if ($counter){
	# 閲覧時のみカウントアップ
	if ($mode == '') { $cntup=1; } else { $cntup=0; }

	# カウントファイルを読みこみ
	$in = file($cntfile);
	$data = $in[0];

	# IPチェックとログ破損チェック
	list($cnt, $ip) = explode(":", $data);
	if ($REMOTE_ADDR == $ip || $cnt == "") { $cntup=0; }

	# カウントアップ
	if ($cntup) {
		$cnt++;
		$fp = fopen($cntfile,"w");
		fputs ($fp,"$cnt:$REMOTE_ADDR");
		fclose($fp);
	}

	# 桁数調整
	$format = "%0".$mini_fig."d";
	$cnt = sprintf("$format",$cnt);

	# GIFカウンタ表示
	if ($counter == 2) {
		for($i = 0; $i < $mini_fig; $i++) {
			$cnts = substr($cnt, $i, 1);
			print "<IMG src=\"$gif_path$cnts.gif\" alt=\"$cnts\" width=\"$mini_w\" height=\"$mini_h\">";
		}
	}
	# テキストカウンタ表示
	else {
		print "<FONT color=\"$cnt_color\" face=\"verdana,Times New Roman,Arial\">$cnt</FONT><br>\n";
	}
}
print "<CENTER>\n";
if ($banner1 != "<!-- 上部 -->") { print "$banner1\n"; }
if ($title_gif == '') {
	print "<B style=\"font-size: $t_size; color:$t_color; face:'$face'\">$title</B>\n";
} else {
	print "<IMG src=\"$title_gif\" width=\"$tg_w\" height=\"$tg_h\" alt=\"$title\">\n";
}
echo <<<EOD
<HR>
[<A href="$homepage" target='_top'>トップに戻る</A>]
[<A href="$script?mode=howto">使いかた</A>]
[<A href="$script?mode=find">ワード検索</A>]
EOD;
# 過去ログのリンク部を表示
if ($pastkey) { print "[<A href=\"$script?mode=past\">過去ログ</A>]\n"; }
echo <<<EOD
[<A href="$script?mode=admin">管理用</a>]
<HR></CENTER><BR>
EOD;
/* form */
echo <<<EOD
<FORM action="$script" method="POST" enctype="multipart/form-data">
<INPUT type=hidden name=mode value="regist">
<TABLE border=0 cellspacing=0>
<TR>
  <TD nowrap><B>おなまえ</B></TD>
  <TD><INPUT type=text name=name size="$nam_wid" value="$c_name"></TD>
</TR>
<TR>
  <TD nowrap><B>Ｅメール</B></TD>
  <TD><INPUT type=text name=email size="$nam_wid" value="$c_email"></TD>
</TR>
<TR>
  <TD nowrap><B>題　　名</B></TD>
  <TD nowrap>
    <INPUT type=text name=sub size="$sub_wid" value="">
	<INPUT type=submit value="投稿する"><INPUT type=reset value="リセット">
  </TD>
</TR>
<TR>
  <TD colspan=2>
    <B>コメント</B><BR>
    <TEXTAREA cols="$com_wid" rows=7 name=comment wrap="soft"></TEXTAREA>
  </TD>
</TR>
<TR>
  <TD nowrap><B>ＵＲＬ</B></TD>
  <TD><INPUT type=text size="$url_wid" name=url value="http://$c_url"></TD>
</TR>
<TR>
  <TD><B>添付File</B></TD>
  <INPUT TYPE=hidden name=MAX_FILE_SIZE value="$maxdata">
  <TD><INPUT type=file name=upfile size="$sub_wid"></TD>
  </TR>
<TR>
  <TD nowrap><B>削除キー</B></TD>
  <TD><INPUT type=password name=pwd size=9 maxlength=8 value="$c_pwd"><SMALL>(自分の記事を削除時に使用。英数字で8文字以内)</SMALL></TD>
</TR>
<TR>
  <TD nowrap><B>文字色</B></TD>
  <TD>
EOD;
if ($c_color == "") { $c_color = $COLORS[0]; }
while (list(, $value) = each ($COLORS)) {
	if ($c_color == $value) {
		print "      <INPUT type=radio name=color value=\"$value\" checked>";
		print "<FONT color=\"$value\">■</FONT>\n";
	} else {
		print "      <INPUT type=radio name=color value=\"$value\">";
		print "<FONT color=\"$value\">■</FONT>\n";
	}
}
print "</TD></TR></TABLE></FORM>";
if ($ImageCheck) {
	print "・画像は管理者が許可するまで「COMING SOON」のアイコンが表示されます。<BR>\n";
}
print "<CENTER><BR>\n";
# ページ区切り処理
$start = $page + 1;
$end   = $page + $p_log;
$in = file("$logfile");
$top = array_shift ($in);
$i=0;
$flag=0;
while (list (, $line) = each ($in)) {
	list($no,$reno,$date,$namae,$mail,$sub,$comment,
		$url2,$host,$pw,$color2,$tail,$w,$h,$chk) = explode("<>",$line);
	if ($reno == "") { $i++; }
	if ($i < $start) { continue; }
	if ($i > $end) { continue; }
	if (strlen($sub) > $sub_len*2) {
		$sub = substr($sub,0,$sub_len*2);
		$sub .= "...";
	}
	if ($mail) { $namae = "<A href=\"mailto:$mail\">$namae</A>"; }
	if ($home_icon && $url2) { $url2 = "<A href=\"http://$url2\" target='_blank'><IMG src=\"$ImgDir$IconHome\" border=0 align=top alt='HomePage'></A>"; }
	elseif (!$home_icon && $url2) { $url2 = "&lt;<A href=\"http://$url2\" target='_blank'>HOME</A>&gt;"; }
	if (!$reno && $flag) {
		print "</TD></TR></TABLE><BR><BR>\n";
		$flag=1;
	}
	if (!$reno) {
		print "<TABLE border=1 width='100%' bgcolor=\"$tbl_color\" cellspacing=0 cellpadding=2><TR><TD>\n";
		$flag=1;
	}
	if ($reno) { print "<HR noshade size=1 width='90%'>\n"; }
	print "<TABLE border=0 cellpadding=2><TR>\n";
	if ($reno) { print "<TD rowspan=2 width=40><BR></TD>"; }
	print "<TD valign=top nowrap><FONT color=\"$sub_color\"><B>$sub</B></FONT>　";
	if (!$reno) { print "投稿者：<B>$namae</B> <SMALL>投稿日：$date</SMALL> "; }
	else { print "<B>$namae</B> - <SMALL>$date</SMALL> "; }
	print "<FONT color=\"$sub_color\"><SMALL>No.$no</SMALL></FONT></TD>";
	print "<TD valign=top nowrap> &nbsp; $url2 </TD><TD valign=top>\n";
	if (!$reno) {
		print "<FORM action=\"$script\" method=POST>\n";
		print "<INPUT type=hidden name=mode value=res>\n";
		print "<INPUT type=hidden name=no value=$no>\n";
		print "<INPUT type=submit value='返信'></TD></FORM>\n";
	} else {
		print "<BR></TD>\n";
	}
	print "</TR></TABLE><TABLE border=0 cellpadding=5><TR>\n";
	if ($reno) { print "<TD width=32><BR></TD>\n"; }
	print "<TD>";
	if (!$reno) { print "<BLOCKQUOTE>\n"; }
	# 自動リンク
	if ($autolink) { $comment = auto_link($comment); }
	if (is_file("$ImgDir$no$tail")) {
		if ($tail == ".gif" || $tail == ".jpg" || $tail == ".png") {
			if ($ImageCheck && $chk != 1) {
				print "<P><IMG src=\"$ImgDir$IconSoon\">\n";
			} elseif (($w < $MaxW) && ($h < $MaxH)) {
				print "<P><A href=\"$ImgDir$no$tail\" target='_blank'><IMG src=\"$ImgDir$no$tail\" width=$w height=$h border=0 align=left hspace=18></A>\n";
			} else {
				print "<P><A href=\"$ImgDir$no$tail\" target='_blank'><IMG src=\"$ImgDir2$no$tail\" border=0 align=left hspace=18></A>\n";
			}
		} else {
			print "<P><A href=\"$ImgDir$no$tail\"><IMG src=\"$ImgDir$IconClip\" border=0 alt='Download:$no$tail'></A> <B>$no$tail</B>\n";
		}
	}
	print "<FONT color=\"$color2\">$comment</FONT>";
	if (!$reno) { print "</BLOCKQUOTE>\n"; }
	print "</TD></TR></TABLE>\n";
}
print "</TD></TR></TABLE></CENTER>\n";

$next = $page + $p_log;
$back = $page - $p_log;

$p_flag=0;
print "<P><BLOCKQUOTE><TABLE cellpadding=0 cellspacing=0><TR>\n";
if ($back >= 0) {
	$p_flag=1;
	print "<TD><FORM action=\"$script\" method=\"POST\">\n";
	print "<INPUT type=hidden name=page value=\"$back\">\n";
	print "<INPUT type=submit value=\"前の $p_log 件\"></TD></FORM>\n";
}
if ($next < $i) {
	$p_flag=1;
	print "<TD><FORM action=\"$script\" method=\"POST\">\n";
	print "<INPUT type=hidden name=page value=\"$next\">\n";
	print "<INPUT type=submit value=\"次の $p_log 件\"></TD></FORM>\n";
}
# ページ移動ボタン表示
if ($p_flag) {
	print "<TD width=10></TD><TD>[直接移動]\n";
	$x=1;
	$y=0;
	while ($i > 0) {
		if ($page == $y) { print "<B>[$x]</B>\n"; }
		else { print "[<A href=\"$script?page=$y\">$x</A>]\n"; }
		$x++;
		$y = $y + $p_log;
		$i = $i - $p_log;
	}
	print "</TD>\n";
}
echo <<<EOD
</TR></TABLE></BLOCKQUOTE>
<DIV align=center>
<FORM action="$script" method="POST">
<FONT color=$t_color><SMALL>- 以下のフォームから自分の投稿記事を修正・削除することができます -</SMALL></FONT><BR>
処理 <SELECT name=mode>
<OPTION value=usr_edt>修正
<OPTION value=usr_del>削除</select>
記事No <INPUT type=text name=no size=3>
パスワード <INPUT type=password name=pwd size=4 maxlength=8>
<INPUT type=submit value="送信"></FORM>
$banner2
<!-- 著作権表示部（削除改変不可）-->
<P><SMALL><!-- $ver -->
- <A href="http://www.kent-web.com/" target="_top">Joyful Note</A> -<BR>
- <A href="http://script.s16.xrea.com/" target="_top">php+gd resize</A> -
</SMALL></P></DIV>
</BODY></HTML>
EOD;
exit();
?>
