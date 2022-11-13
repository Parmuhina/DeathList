<?php
class Row
{
    private string $identifikators;
    private string $data;
    private string $navesCelonis;
    private ?array $vardarbigasNavesCelonis;
    private ?array $vardarbigasNavesLietasApstakli;
    private ?array $vardarbigasNavesVeids;

    public function __construct(string $identifikators, string $data, string $navesCelonis,
                                ?array $vardarbigasNavesCelonis=null, ?array $vardarbigasNavesLietasApstakli=null,
                                ?array $vardarbigasNavesVeids=null)
    {
        $this->identifikators=$identifikators;
        $this->data=$data;
        $this->navesCelonis=$navesCelonis;
        $this->vardarbigasNavesCelonis=$vardarbigasNavesCelonis;
        $this->vardarbigasNavesLietasApstakli=$vardarbigasNavesLietasApstakli;
        $this->vardarbigasNavesVeids=$vardarbigasNavesVeids;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function getNavesCelonis(): string
    {
        return $this->navesCelonis;
    }

    public function getVardarbigasNavesCelonis(): ?array
    {
        return $this->vardarbigasNavesCelonis;
    }

    public function getVardarbigasNavesLietasApstakli(): ?array
    {
        return $this->vardarbigasNavesLietasApstakli;
    }

    public function getVardarbigasNavesVeids(): ?array
    {
        return $this->vardarbigasNavesVeids;
    }
}


