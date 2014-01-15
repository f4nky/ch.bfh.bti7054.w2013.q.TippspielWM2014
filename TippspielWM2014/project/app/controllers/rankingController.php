<?php
class RankingController extends Controller {

	public function __construct() {
		parent::__construct();
		Auth::handleLogin();
	}

	public function loadView() {
		$this->view->title = 'Rangliste';
		$this->view->data = $this->getRanking();
		$this->view->dataChart = $this->getRankingForChart();
		$this->view->js = $this->getJqPlotPathes();
		$this->view->css = array('jquery.jqplot.min.css');
		$this->view->render('ranking/rankingView');
	}
	
	public function loadBoxView() {
		$this->view->data = $this->getPartialRanking();
		$this->view->render('sidebar/rankingBoxView', true);
	}
	
	public function getRanking() {
		return $this->model->getRanking();
	}

	public function getRankingForChart() {
		return $this->model->getRankingForChart();
	}

	public function getPartialRanking() {
		return $this->model->getPartialRanking();
	}

	public function getJqPlotPathes() {
		$files = array(
			'jqplot/jquery.jqplot.min.js',
			'jqplot/jqplot.barRenderer.min.js',
			'jqplot/jqplot.canvasAxisLabelRenderer.min.js',
			'jqplot/jqplot.canvasAxisTickRenderer.min.js',
			'jqplot/jqplot.canvasTextRenderer.min.js',
			'jqplot/jqplot.categoryAxisRenderer.min.js',
			'jqplot/jqplot.dateAxisRenderer.min.js',
			'jqplot/jqplot.logAxisRenderer.min.js',
			'jqplot/jqplot.pointLabels.min.js',
			'jqplot/jqplotFuncs.js'
		);
		return $files;
	}
}