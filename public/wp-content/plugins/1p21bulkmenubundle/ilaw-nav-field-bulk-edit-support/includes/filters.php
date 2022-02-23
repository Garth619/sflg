<?php
add_action( 'widgets_init', '_ilaw_sm_register_sidebars' );

function _ilaw_sm_disable_widget_gutenberg(){
	if(!get_field('sm_disable_gutenberg','options')){
        return true;
    }else{
        return false;
    }
}
add_filter( 'use_widgets_block_editor', '_ilaw_sm_disable_widget_gutenberg' );