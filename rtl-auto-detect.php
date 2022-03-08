
/***********************************
/* Released under the MIT license */
/*
/* ulike123 RTL auto-detect 2022.
*/

/***********************************
/* Installation */
/*
/* Copy&Paste or require_once(this_code_as_page.php)
*/

/***********************************
/* Usage example/sample */
/*
/* <div dir="<?=@dir($sampleHTML_full_or_quote);?>">$sampleHTML</div>
/* 
/* $sampleHTML can be a hooked blog post content ex: WordPress:
/*
/* $some = @get_the_content( 'Read more' );
/* $content = @apply_filters( 'the_content', get_the_content() );
/* <div dir="<?=@dir($some);?>">$content</div>
/*
/* See function get_the_content() >> https://developer.wordpress.org/reference/functions/get_the_content/
*/

//==================================================================

function mb_string_to_array ($text) // PHP website and extra developed by Al bunyan 2020.
{
    $strlen = @mb_strlen($text);
    while ($strlen)
    {
        $array[] = @mb_substr($text,0,1,"UTF-8");        // first chr from every offsetted word, the start of a single-word string, or the last word - first chr..
        $word = @mb_stripos($text, ' ', 0, "UTF-8");     // look for word delimiter..
        $word = (@empty($word)) ? 1 : $word;             // if there is just a word or it is the last word, save its chars as words to the array..
        $text = @mb_substr($text,$word,$strlen,"UTF-8"); // offset..
        $strlen = @mb_strlen($text);                     // offset strlen, too, to reach an end..
    }
    return $array;
}

function dir($text) // Using language reading dir score by Al bunyan 2020.
{
    try
    {
        $text = @trim( @mb_ereg_replace("\<[\D\S\s]*?\>", " ", @html_entity_decode($text), "pij") ); // returns a plain text content.. TODO check with inquiries emails
        $none = @trim( @preg_replace( '/\W*\s*/' , '' , $text ) ); // strips out UTF-8.. DON'T rethink it !!!
        $arab = @trim( @preg_replace( '/\w*\s*/' , '' , $text ) ); // strips out none UTF-8..

        // check..
        if( @empty($text) || @is_numeric($text) ){ return 'auto'; }else{ $splits = @mb_string_to_array($arab); }

/* Worldwide rtls..
/*
/* The following rtl chars has been elected carefully.
/* Their election has taken me days working on them.
/* Edit with care!
/* Remember!
/* You may need RTL keyboard!
/* This file must be saved as UTF-8 or greator.
/*
*/

$rtl = 'א,בּ,גּ,דּ,ה,ו,וּ,וֹ,ז,ח,ט,יִ,כּ,ך,ל,מ,ם,נ,ן,ס,ע,פּ,ף,צ,ץ,ק,ר,שׁ,שׂ,תּ,אַ,אָ,בֿ,װ,ײַ,פֿ,ي,و,ه,ن,م,ل,ك,ق,ف,غ,ع,ظ,ط,ض,ص,ش,س,ز,ر,ذ,د,خ,ح,ج,ث,ت,ب,ا,أ,ئ,ء,ؤ,آ,ة,ى,ٻ,ڀ,پ,ٿ,ٽ,ٺ,ڄ,جھ,ڃ,چ,ڇ,ڌ,ڏ,ڊ,ڍ,ڙ,ڦ,ڪ,ک,گ,ڳ,گھ,ڱ,ݣ,ڻ,ټ,څ,ځ,ډ,ړ,ژ,ږ,ښ,ګ,ڼ,ۀ,ې,ی,ۍ,ٹ,ڈ,ڑ,ں,ہ,ے,ـ,‎—,ހ‎,ށ,ޱ,އް‎‎,އޯ,‎އޮ,އޭ‎‎,އެ‎,‎އޫ‎,އު,އީ,އި,އާ,އަ‎‎‎‎,‎ޥ,ޤ,‎ޣ,ޢ,ޡ,ޠ,ޟ,ޞ,‎ޝ,ޜ,ޚ,‎ޙ,ޛ‎,‎ޗ,ޔ‎,ސ,‎ތ,ލ,‎‎ގ‎,ޑ,ޏ,ފ,‎މ,ކ‎,ޓ,ޅ,‎ވ,ޒ‎‎,‎ބ,‎ޖ,ރ‎‎,ދ,ޕ,‎ނ,ޘ,މާ,ދާ,ހު,ރި,ހާ,ން,ސާ,ނު,ވެ,ސް,ފަ,ވަ,ނީ,ދަ,ރަ,ޖަ,ޙަ,ޤު,ތަ,ކު,ގަ,މި,ނި,ކަ,ހަ,މަ,ލި,ބި,ގެ,ވާ,ބަ,ގޮ,ތު,މީ,ނަ,ށް,ހެ,ޔޮ,ވި,ބު,ދީ,ބާ,ރު,ދި,ނެ,ކާ,މެ,ދު,މު,ޢާ,ލާ,ތް,ޚު,ތެ,ރޫ,ޙެ,‎ب‎,‎چ,‎د,‎ە,‎ێ,‎ف‎,گ‎,‎ح,‎ى,‎ی,‎ژ,‎ک,‎ل,‎ڵ,‎م,‎ن,ۆ,‎پ,‎ق,‎ر,‎ڕ,‎س,‎ش,‎ت,‎و,‎ۊ,‎ڤ,‎خ,‎غ,‎ز,‎ع,ݙ,ݨ,ڭ,وْ,ۇ,ۈ,ۋ,ܐ,ܒ,ܓ,ܕ,ܗ,ܘ,ܙ,ܚ,ܛ,ܝ,ܟ,ܠ,ܡ,ܢ,ܣ,ܥ,ܦ,ܨ,ܩ,ܪ,ܫ,ܬ';

/**/

        $cnt = 0;
        $mjr = 0;
        $num = 0;
        $idx = 0;

        $str = false;

        foreach($splits as $split)
        {
            if(@mb_stristr($rtl, $split)!==FALSE){ $cnt++; if( $idx == 0 || $idx == @count($splits)-1 ){ $mjr++; } }
            if($idx == 0 && $cnt>0){ $str = true; }
            $idx++;
        }

        $idx -= $num;
        $idx += @strlen($none);

        if( ( $cnt > ($idx/2) ) || ( $str && $cnt >= ($idx/2) ) || ( $mjr && $cnt >= @intval($idx/2) ) ){ return 'rtl'; }else{ return 'ltr'; }
    }
    catch(Exception $e){ return 'auto'; }
}

//==================================================================
