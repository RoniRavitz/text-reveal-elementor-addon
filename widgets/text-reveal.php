<?php
class Elementor_text_reveal extends \Elementor\Widget_Base {

	public function get_name() {
		return 'text_reveal';
	}

	public function get_title() {
		return esc_html__( 'text reveal', 'text-reveal' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'text', 'reveal' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'text-reveal' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'text-reveal' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Hello world', 'text-reveal' ),
			]
		);
		

		$this->end_controls_section();

		// Content Tab End


		// Style Tab Start

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'text-reveal' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'text-reveal' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .text-reveal' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_color_reveal',
			[
				'label' => esc_html__( 'Text Color reveal', 'text-reveal' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .text-reveal:before' => 'color: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'reveal_time',
			[
				'label' => esc_html__( 'reveal time', 'text-reveal' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					
				],
				'default' => [
					'unit' => 'px',
					'size' => 300,
				],
				
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .text-reveal',
			]
		);

	

	

		$this->end_controls_section();

		// Style Tab End

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<h2 class="text-reveal">
			<?php echo $settings['title']; ?>
			
	</h2>

		<style>
			.text-reveal{
				position: relative;
				display: inline;
				text-wrap: nowrap;

			}
			.text-reveal:before 
{
	content: attr(data-text);
	position: absolute;
	right: 0;
	width: 0%;
	overflow: hidden;
	
	transition: 0.8s width ease !important;
}
.text-reveal.active::before 
{
	width: 100%;
}

		</style>

		<script>
      function reveal() {
        let item = document.querySelectorAll(".text-reveal");
        for (var i = 0; i < item.length; i++) {
          let windowHeight = window.innerHeight;
          let elementTop = item[i].getBoundingClientRect().top;
          let elementVisible = <?php  echo $settings['reveal_time']['size']; ?>;

		
		  
		  let itemText = item[i].innerText;
          item[i].setAttribute("data-text", itemText);

          if (elementTop < windowHeight - elementVisible) {
            item[i].classList.add("active");
          } else {
            item[i].classList.remove("active");
          }
        }
      }
      window.addEventListener("scroll", reveal);
    </script>

		<?php
	}


}