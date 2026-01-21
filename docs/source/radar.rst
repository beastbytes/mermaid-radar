Radar
=====

.. php:class:: Radar

    Represents a Radar diagram

    .. php:method:: addAxis(Axis ...$axis)

        Adds axes to the diagram

        :param Axis ...$axis: The axes
        :returns: An instance of Radar with the axes added
        :rtype: Radar
    
    .. php:method:: addCurve(Curve ...$curve)

        Adds curve(s) drawn on the diagram.

        Every curve must have a datapoint for each axis.

        :param Curve ...$curve:
        :returns: An instance of Radar with curves added
        :rtype: Radar
    
    .. php:method:: render(array $attributes = [])
    
        Renders a Mermaid chart or diagram
    
        :param array $attributes: HTML attributes for the <pre> tag as name=>value pairs

        .. note:: The `mermaid` class is added

        :returns: A Mermaid chart or diagram code in a <pre> tag
        :rtype: string
    
    .. php:method:: showLegend(bool $showLegend)

        :param bool $showLegend:
        :returns: An instance of Radar with
        :rtype: Radar
    
    .. php:method:: withAxis(Axis ...$axis)

        Sets the diagram axes

        :param Axis ...$axis: The axes
        :returns: An instance of Radar with the axes
        :rtype: Radar
    
    .. php:method:: withCurve(Curve ...$curve)

        Sets the curves drawn on the diagram.

        Every curve must have a datapoint for each axis.

        :param Curve ...$curve:
        :returns: An instance of Radar with the curves
        :rtype: Radar
    
    .. php:method:: withGraticule(Graticule $graticule)

        The shape of the graticule: :php:case:`Graticule::circle` or :php:case:`Graticule::polygon`

        :param Graticule $graticule: The graticule shape
        :returns: An instance of Radar with the graticule
        :rtype: Radar
    
    .. php:method:: withMax(int $max)

        Sets the maximum value of the diagram (default: determined from the data points)

        :param int $max: The maximum value of the diagram
        :returns: An instance of Radar with the maximum value set
        :rtype: Radar
    
    .. php:method:: withMin(int $min)

        Sets the minimum value of the diagram (default: 0)

        :param int $min: The minimum value of the diagram
        :returns: An instance of Radar with the minimum value set
        :rtype: Radar
    
    .. php:method:: withTicks(int $ticks)

        Sets the number of ticks (concentric circles/polygons) (default: 5)

        :param int $ticks: The number of ticks
        :returns: An instance of Radar with ticks set
        :rtype: Radar
