<?php
/**
 * Created by PhpStorm.
 * User: Armen
 * Date: 11/20/17
 * Time: 12:00 PM
 */

namespace frontend\components;


use backend\models\User;
use yii\base\Component;

/**
 * Class CheckRules
 * @package frontend\components
 */
class Calendar extends Component
{

    public static function CreateFile($d)
    {
        $date = '';
        $date .= date("Ymd", strtotime($d));
        $date .= 'T';
        $date .= date("His", strtotime($d));

        $content = 'BEGIN:VCALENDAR
PRODID:-//Microsoft Corporation//Outlook 15.0 MIMEDIR//EN
VERSION:2.0
METHOD:PUBLISH
X-MS-OLK-FORCEINSPECTOROPEN:TRUE
BEGIN:VTIMEZONE
TZID:Caucasus Standard Time
BEGIN:STANDARD
DTSTART:16010101T000000
TZOFFSETFROM:+0400
TZOFFSETTO:+0400
END:STANDARD
END:VTIMEZONE
BEGIN:VEVENT
CLASS:PUBLIC
CREATED:20190227T124849Z
DESCRIPTION:\n
DTEND;TZID="Caucasus Standard Time":' . $date . '
DTSTAMP:20190227T124446Z
DTSTART;TZID="Caucasus Standard Time":' . $date . '
LAST-MODIFIED:20190227T124849Z
PRIORITY:5
SEQUENCE:0
SUMMARY;LANGUAGE=en-us:Session
TRANSP:OPAQUE
UID:040000008200E00074C5B7101A82E0080000000050B250BFBBCED401000000000000000
	0100000006F886741B0AA5244ACBADC99403E561B
X-ALT-DESC;FMTTYPE=text/html:<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//E
	N">\n<HTML>\n<HEAD>\n<META NAME="Generator" CONTENT="MS Exchange Server ve
	rsion rmj.rmm.rup.rpr">\n<TITLE></TITLE>\n</HEAD>\n<BODY>\n<!-- Converted 
	from text/plain format -->\n<BR>\n\n</BODY>\n</HTML>
X-MICROSOFT-CDO-BUSYSTATUS:BUSY
X-MICROSOFT-CDO-IMPORTANCE:1
X-MICROSOFT-DISALLOW-COUNTER:FALSE
X-MS-OLK-AUTOFILLLOCATION:TRUE
X-MS-OLK-CONFTYPE:0
END:VEVENT
END:VCALENDAR
';
        $myfile = fopen(\Yii::getAlias('@frontend') . '/web/attach/session.ics', "w") or die("Unable to open file!");
        fwrite($myfile, $content);
        fclose($myfile);
    }

}