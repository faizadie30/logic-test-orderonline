<?php
function get_schemethat($html)
{
    $result = [];

    $parser = new DOMDocument();
    $parser->loadHTML($html);

    $result_parser = $parser->getElementsByTagName('*');
    foreach ($result_parser as $el_from_parser) {
        $attributes = $el_from_parser->attributes;
        if ($attributes->length > 0) {
            $define_arr = [];
            foreach ($attributes as $attribute) {
                $name_attr = $attribute->name;
                $val_attr = $attribute->value;
                if (strpos($name_attr, 'sc-') === 0) {
                    $substr_sc_from_attr = substr($name_attr, 3);
                    if (!empty($val_attr)) {
                        $define_arr[$substr_sc_from_attr] = $val_attr;
                    } else {
                        array_push($result, $substr_sc_from_attr);
                    }
                }
            }
            if (!empty($define_arr)) {
                $result[] = $define_arr;
            }
        }
    }

    return $result;
}

$test_case = [
    '<i sc-root="Hello">World</i>',
    '<div sc-prop sc-alias="" sc-type="Organization"><div sc-name="Alice">Hello <i sc-name="Wonderland">World</i></div></div>',
    '<i sc-root>Hello</i>',
    '<div><div sc-rootbear title="Oh My">Hello <i sc-org>World</i></div></div>'
];

for ($i = 0; $i < count($test_case); $i++) {
    $test = get_schemethat($test_case[$i]);
    print_r($test);
}


# note: 
// 1. saya tidak tau soalnya yang mana yang tepat, tapi saya coba mengusahakan untuk semua case di soal ke 2 menjadi 1 case, dan terdapat issue dimana saya tidak dapat mendefine attribute dari element jika tidak memiliki value, jadi saya set default saja menjadi sebuah value, jika memang tidak memiliki value dari attribute tersebut
// 2. dan saya menggunakan domDocument untuk parsing string menjadi html agar lebih medekati dengan output yang di inginkan