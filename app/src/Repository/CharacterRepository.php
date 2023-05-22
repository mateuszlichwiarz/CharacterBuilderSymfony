<?php

namespace App\Repository;

use App\Entity\Character;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Character>
 *
 * @method Character|null find($id, $lockMode = null, $lockVersion = null)
 * @method Character|null findOneBy(array $criteria, array $orderBy = null)
 * @method Character[]    findAll()
 * @method Character[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CharacterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Character::class);
    }

    public function save(Character $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Character $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findById(int $id): ?Character
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function updateArmorById(int $armorId)
    {
        return $this->createQueryBuilder('c')
            ->update('Character', 'c')
            ->set('c.armor', ':armor')
            ->where('c.id', ':id')
            ->setParameter('armor', $armorId)
            ->getQuery();
    }

    public function updateArmorByName(string $armorName)
    {
        return $this->createQueryBuilder('c')
            ->update('Character', 'c')
            ->set('c.armor', ':armor')
            ->where('c.name', ':name')
            ->setParameter('armor', $armorName)
            ->getQuery();
    }

    public function updateWeaponById(int $weaponId)
    {
        return $this->createQueryBuilder('c')
            ->update('Character', 'c')
            ->set('c.weapon', ':weapon')
            ->where('c.id', ':id')
            ->setParameter('weapon', $weaponId)
            ->getQuery();
    }

    public function updateWeaponByName(string $weaponName)
    {
        return $this->createQueryBuilder('c')
            ->update('Character', 'c')
            ->set('c.weapon', ':weapon')
            ->where('c.name', ':name')
            ->setParameter('weapon', $weaponName)
            ->getQuery();
    }

//    /**
//     * @return Character[] Returns an array of Character objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Character
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
