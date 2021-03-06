
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

$rtl = '??,????,????,????,??,??,????,????,??,??,??,????,????,??,??,??,??,??,??,??,??,????,??,??,??,??,??,????,????,????,????,????,????,??,????,????,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,????,??,??,??,??,??,??,??,??,??,??,??,??,??,????,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??????,?????,??,??,??????????,????,???????,??????????,???????,??????????,????,????,????,????,????????????????,?????,??,?????,??,??,??,??,??,?????,??,??,?????,?????,?????,?????,??,?????,??,???????????,??,??,??,?????,?????,??,??,?????,????????,?????,?????,????????,??,??,?????,??,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????,????????,?????,?????,?????,?????,????????,?????,?????,?????,?????,?????,?????,?????,?????,?????,?????,??,?????,?????,?????,?????,?????,?????,?????,?????,?????,?????,?????,?????,?????,?????,??,??,??,????,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??,??';

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
