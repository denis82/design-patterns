<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\DataMapper;

class Worker
{
    private string $_name;
    public function __construct(string $name)
    {
        $this->_name = $name;
    }

    public static function make($args): Worker
    {
        return new self($args['name']);
    }

    public function getName(): string
    {
        return $this->_name;
    }
}

class WorkerMapper
{
    private WorkerMapperAdapter $_workerMapperAdapter;

    public function __construct(WorkerMapperAdapter $workerMapperAdapter)
    {
        $this->_workerMapperAdapter = $workerMapperAdapter;
    }

    public function findById($id): Worker | string
    {
        $res = $this->_workerMapperAdapter->find($id);
        if ($res === null) {
            return 'Worker with this id does not sxists';
        }
        return $this->make($res);
    }

    private function make($args): Worker
    {
        return Worker::make($args);
    }
}

class WorkerMapperAdapter
{
    private array $_data = [];

    public function __construct(array $data)
    {
        $this->_data = $data;
    }

    public function find($id): ?array
    {
        if (isset($this->_data[$id])) {
            return $this->_data[$id];
        }
        return null;
    }
}


$data = [
    1 => [
        'name' => 'Den'
    ]
];
$workerMapperAdapter = new WorkerMapperAdapter($data);
$workerMapper = new WorkerMapper($workerMapperAdapter);
$worker = $workerMapper->findById(1);
var_dump($worker->getName());
