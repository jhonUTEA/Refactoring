<?php

namespace Tests;

use App\HtmlElement;

class HtmlElementTest extends TestCase{


    /** @test */
    function it_checks_if_a_element_is_void_or_not(){
        
        $this->assertFalse((new HtmlElement('p'))->isVoid());

        $this->assertTrue((new HtmlElement('img'))->isVoid());

    }

    /** @test */
    function it_generates_attributes(){

        $element = new HtmlElement('span',['class' => 'a_span', 'id' => 'the_span']);

        $this->assertSame(' class="a_span" id="the_span"', $element->attributes());
    }

    /** @test */
    function it_generates_a_paragraph_with_content(){

        $element = new HtmlElement('p', [], 'Este es el contenido');
        
        $this->assertSame(
            '<p>Este es el contenido</p>',
            $element->render()
        );
    }

    /** @test */
    function it_generates_a_paragraph_with_content_and_an_id_attibute(){

        $element = new HtmlElement(
            'p', ['id' => 'my_paragraph'], 'Este es el contenido'
        );
    }
}