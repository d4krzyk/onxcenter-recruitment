<?php
class TextInput {
    protected $value = '';

    public function add($text) {
        $this->value .= $text;
    }

    public function getValue() {
        return $this->value;
    }
}

class NumericInput extends TextInput {
    public function add($text) {
        $filteredText = preg_replace('/[^0-9]/', '', $text); //The preg_replace filter function to change non-numeric characters to a empty character
        $this->value .= $filteredText;
    }
    public function getValue() {
        return $this->value;
    }
}

//Usage:
$input_text = new TextInput();
$input_text->add("Example");
$input_text->add(" Text");
$input_text->add(" 123abcdef");
echo $input_text->getValue(); // Text Output
echo "\n";
$input_numeric = new NumericInput();
$input_numeric->add("0aaasf12abc3");
$input_numeric->add("45!@#");
$input_numeric->add("6wieuy%^$7tqr8wuiy9......");
echo $input_numeric->getValue(); // Filtered Numeric Output
echo "\n";
?>