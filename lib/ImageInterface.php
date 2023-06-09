<?php
declare(strict_types=1);

namespace estart\image;

interface ImageInterface
{
    public function __construct(string $imageContent, array $bgRgb = null);

    /**
     * 生成缩略图.
     *
     * 宽度不小于$thumbWidth或高度不小于$thumbHeight的图片生成缩略图
     * 建议缩略图和被提取缩略图的文件放于同一目录，文件名为“被提取缩略图文件.thumb.jpg”
     *
     * @param bool $isCut = true 是否裁剪图片，true）裁掉超过比例的部分；false）不裁剪图片，图片缩放显示，增加白色背景
     * @param int $cutPlace = 5  裁剪保留位置 1:左上, 2：中上， 3右上, 4：左中， 5：中中， 6：右中，7：左下， 8：中下，9右下
     * @param int $quality = 90  生成的缩略图质量
     * @param string $thumbType = 'jpg' 缩略图图片格式，同时是图片后缀，jpg/png/webp
     */
    public function thumb(int $thumbWidth, int $thumbHeight, bool $isCut = true, int $cutPlace = 5, int $quality = 90, string $thumbType = 'jpg'): string;

    /**
     * 给图片打水印.
     *
     * 建议用gif或png图片做水印，jpg不能设置透明，故不推荐用
     *
     * @param string $watermarkFile 水印图片路径，png 或 gif 图片
     * @param int $watermarkPlace = 9 水印放置位置 1:左上, 2：中上， 3右上, 4：左中， 5：中中， 6：右中，7：左下， 8：中下，9右下
     * @param int $quality = 95 被打水印后的新图片(相对于打水印前)质量百分比
     */
    public function watermark(string $watermarkFile, int $watermarkPlace = 9, int $quality = 90): null|string;
}
