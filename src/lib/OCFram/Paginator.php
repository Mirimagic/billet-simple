<?php
namespace OCFram;

class Paginator
{
    private $_conn,
            $_limit,
            $_page,
            $_query,
            $_total,
            $_row_start;

    public function __construct($conn, $query)
    {
        $this->_conn = $conn;
        $this->_query = $query;

        $rs = $this->_conn->query($this->_query);
        $this->_total = $rs->rowCount();
    }

    public function getData($limit = 10, $page = 1)
    {
        $this->_limit = $limit;
        $this->_page = $page;

        if($this->_limit == 'all')
        {
            $query = $this->_query;
        }
        else
        {
            $this->_row_start = (($this->_page - 1) * $this->_limit);
            $query = $this->_query . " LIMIT {$this->_row_start}, $this->_limit";
        }

        $rs = $this->_conn->query($query);

        while ($row = $rs->fetch())
        {
            $results[] = $row;
        }

        $result = new StdClass();
        $result->page = $this->_page;
        $result->limit = $this->_limit;
        $result->total = $this->_total;
        $result->data = $results;

        return $result;
    }

    public function createLinks($links)
    {
        if($this->_limit == 'all')
        {
            return '';
        }

        $last = ceil($this->_total / $this->_limit);
        $start = (($this->_page - $links) > 0) ? $this->_page - $links : 1;
        $end = (($this->_page + $links) < $last) ? $this->_page + $links : $last;

        //debugging
/*        echo '$total: '.$this->_total.' | ';
        echo '$row_start: '.$this->_row_start.' | ';
        echo '$limit: '.$this->_limit.' | ';
        echo '$start: '.$start.' | ';
        echo '$end: '.$end.' | ';
        echo '$last: '.$last.' | ';
        echo '$page: '.$this->_page.' | ';
        echo '$links: '.$links.' <br /> ';*/

        $html = '<ul class="pagination">';

        $class = ($this->_page == 1) ? "disabled" : "";

        $previous_page = ($this->_page == 1) ? '<li class="page-item ' . $class . '"><a href="" class="page-link" aria-label="Previous"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>' : '<li class="page-item ' . $class . '"><a href="?limit=' . $this->_limit . '&amp;page=' . ($this->_page - 1) . '" class="page-link" aria-label="Previous"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>';

        $html .= $previous_page;

        if ($start > 1)
        {
            $html .= '<li class="page-item"><a href="?limit=' . $this->_limit . '&amp;page=1" class="page-link">1</a></li>';
            $html .= '<li class="page-item disabled"><span>...</span></li>';
        }

        for ($i = $start ; $i <= $end; $i++)
        {
            $class = ($this->_page == $i) ? "active" : "";
            $html.= '<li class="page-item ' . $class . '"><a href="?limit=' . $this->_limit . '&amp;page=' . $i . '" class="page-link">' . $i . '</a></li>';
        }

        if ($end < $last)
        {
            $html .= '<li class="page-item disabled"><span>...</span></li>';
            $html .= '<li class="page-item ' . $class . '"><a href="?limit=' . $this->_limit . '&amp;page=' . $last . '" class="page-link">' . $last . '</a></li>';
        }

        $class = ($this->_page == $last) ? "disabled" : "";

        $next_page = ($this->_page == $last) ? '<li class="page-item ' . $class . '"><a href="" class="page-link" aria-label="Next"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>' : '<li class="page-item ' . $class . '"><a href="?limit=' . $this->_limit . '&amp;page=' . ($this->_page - 1) . '" class="page-link" aria-label="Next"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>';

        $html .= $next_page;
        $html .= '</ul>';

        return $html;
    }
}
