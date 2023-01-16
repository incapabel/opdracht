<?php

namespace App\Repository;

use App\Entity\WeatherForecast;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WeatherForecast>
 *
 * @method WeatherForecast|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeatherForecast|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeatherForecast[]    findAll()
 * @method WeatherForecast[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeatherForecastRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeatherForecast::class);
    }

    public function save(WeatherForecast $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(WeatherForecast $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getTemps(): array
    {
        return $this->createQueryBuilder('s')
            ->select('s.timestamp')
            ->addSelect('s.tmin')
            ->addSelect('s.tmax')
            ->orderBy('s.timestamp')
            ->getQuery()
            ->getResult()
        ;
    }

    public function getRain(): array
    {
        return $this->createQueryBuilder('s')
            ->select('s.timestamp')
            ->addSelect('s.rain')
            ->orderBy('s.timestamp')
            ->getQuery()
            ->getResult()
        ;
    }

    public function getFog(): array
    {
        return $this->createQueryBuilder('s')
            ->select('s.timestamp')
            ->addSelect('s.fog')
            ->orderBy('s.timestamp')
            ->getQuery()
            ->getResult()
        ;
    }

    public function getTempsByTimestamp(string $timestamp)
    {
        return $this->createQueryBuilder('s')
            ->select('s.timestamp')
            ->addSelect('s.tmin')
            ->addSelect('s.tmax')
            ->andWhere('s.timestamp = :val')
            ->setParameter('val', $timestamp)
            ->getQuery()
            ->getResult()
        ;
    }

    public function getRainByTimestamp(string $timestamp)
    {
        return $this->createQueryBuilder('s')
            ->select('s.timestamp')
            ->addSelect('s.fog')
            ->andWhere('s.timestamp = :val')
            ->setParameter('val', $timestamp)
            ->getQuery()
            ->getResult()
        ;
    }

    public function getFogByTimestamp(string $timestamp)
    {
        return $this->createQueryBuilder('s')
            ->select('s.timestamp')
            ->addSelect('s.fog')
            ->andWhere('s.timestamp = :val')
            ->setParameter('val', $timestamp)
            ->getQuery()
            ->getResult()
        ;
    }

//    /**
//     * @return WeatherForecast[] Returns an array of WeatherForecast objects
//     */
//    public function findByExampleField($value): array
//    { 
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?WeatherForecast
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
