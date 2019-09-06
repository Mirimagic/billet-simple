<?php
namespace OCFram;

class StdClass
{
    private $_limit,
            $_page,
            $_total,
            $_data;

    public function setLimit($limit)
    {
        $this->_limit = $limit;
    }

    public function getLimit()
    {
        return $this->_limit;
    }

    public function setPage($page)
    {
        $this->_page = $page;
    }

    public function getPage()
    {
        return $this->_page;
    }

    public function setTotal($total)
    {
        $this->_total = $total;
    }

    public function getTotal()
    {
        return $this->_total;
    }

    public function setData($data)
    {
        $this->_data = $data;
    }

    public function getData()
    {
        return $this->_data;
    }
}