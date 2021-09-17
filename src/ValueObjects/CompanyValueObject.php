<?php

namespace App\ValueObjects;

/**
 * Class CompanyValueObject
 * @package App\ValueObjects
 */
class CompanyValueObject
{
    /**
     * @var int|null
     */
    protected ?int $id;

    /**
     * @var string|null
     */
    protected ?string $name;

    /**
     * @var string|null
     */
    protected ?string $fantasy;

    /**
     * @var string|null
     */
    protected ?string $cnpj;

    /**
     * @var string|null
     */
    protected ?string $port;

    /**
     * @var string|null
     */
    protected ?string $nature;

    /**
     * @var string|null
     */
    protected ?string $phone;

    /**
     * @var string|null
     */
    protected ?string $mail;

    /**
     * @var string|null
     */
    protected ?string $cep;

    /**
     * @var string|null
     */
    protected ?string $state;

    /**
     * @var string|null
     */
    protected ?string $city;

    /**
     * @var string|null
     */
    protected ?string $district;

    /**
     * @var string|null
     */
    protected ?string $street;

    /**
     * @var string|null
     */
    protected ?string $number;

    /**
     * @var \Datetime|null
     */
    protected ?\Datetime $createdAt;

    /**
     * @var \Datetime|null
     */
    protected ?\Datetime $updatedAt;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getFantasy(): ?string
    {
        return $this->fantasy;
    }

    /**
     * @param string|null $fantasy
     */
    public function setFantasy(?string $fantasy): void
    {
        $this->fantasy = $fantasy;
    }

    /**
     * @return string|null
     */
    public function getCnpj(): ?string
    {
        return $this->cnpj;
    }

    /**
     * @param string|null $cnpj
     */
    public function setCnpj(?string $cnpj): void
    {
        $this->cnpj = $cnpj;
    }

    /**
     * @return string|null
     */
    public function getPort(): ?string
    {
        return $this->port;
    }

    /**
     * @param string|null $port
     */
    public function setPort(?string $port): void
    {
        $this->port = $port;
    }

    /**
     * @return string|null
     */
    public function getNature(): ?string
    {
        return $this->nature;
    }

    /**
     * @param string|null $nature
     */
    public function setNature(?string $nature): void
    {
        $this->nature = $nature;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * @param string|null $mail
     */
    public function setMail(?string $mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return string|null
     */
    public function getCep(): ?string
    {
        return $this->cep;
    }

    /**
     * @param string|null $cep
     */
    public function setCep(?string $cep): void
    {
        $this->cep = $cep;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string|null
     */
    public function getDistrict(): ?string
    {
        return $this->district;
    }

    /**
     * @param string|null $district
     */
    public function setDistrict(?string $district): void
    {
        $this->district = $district;
    }

    /**
     * @return string|null
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param string|null $street
     */
    public function setStreet(?string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @param string|null $number
     */
    public function setNumber(?string $number): void
    {
        $this->number = $number;
    }

    /**
     * @return \Datetime|null
     */
    public function getCreatedAt(): ?\Datetime
    {
        return $this->createdAt;
    }

    /**
     * @param \Datetime|null $createdAt
     */
    public function setCreatedAt(?\Datetime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \Datetime|null
     */
    public function getUpdatedAt(): ?\Datetime
    {
        return $this->updatedAt;
    }

    /**
     * @param \Datetime|null $updatedAt
     */
    public function setUpdatedAt(?\Datetime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
